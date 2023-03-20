<?php

namespace App\Services;

use App\Presenters\UserAbilityPresenter;
use App\Presenters\UserPresenter;
use App\Repositories\UserAbilitiesRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\RepositoryInterface;

class AuthService extends AppService
{
    protected RepositoryInterface $repository;

    private UserAbilitiesRepository $userAbilitiesRepository;

    /**
     * @param UserRepository $repository
     * @param UserAbilitiesRepository $userAbilitiesRepository
     */
    public function __construct(
        UserRepository $repository,
        UserAbilitiesRepository $userAbilitiesRepository
    ) {
        $this->repository = $repository;
        $this->userAbilitiesRepository = $userAbilitiesRepository;
    }

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function login(array $data): array
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        if (!Auth::attempt($credentials)) {
            throw new Exception('Unauthorized', 401);
        }

        $user = Auth::user();

        $userAbilities = $this->userAbilitiesRepository
            ->skipPresenter()
            ->findWhere(['user_id' => $user->id]);

        if (empty($userAbilities)) {
            throw new Exception('Unauthorized', 401);
        }

        $userAbilitiesData = [];

        foreach ($userAbilities as $userAbility) {
            $userAbilitiesData[] = strtolower($userAbility->subject->name . '-' . $userAbility->action->name);
        }

        $tokenResult = $user->createToken(
            'Personal Access Token',
            $userAbilitiesData,
            Carbon::now()
                ->addHours(2)
        );

        $token = $tokenResult->plainTextToken;

        return [
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'userData' => $this->userFormat($user),
            'userAbilities' => $this->userAbilityFormat($user->userAbility)
        ];
    }

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function register(array $data): array
    {
        try {
            DB::beginTransaction();
            $user = $this->repository->skipPresenter()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);

            foreach ($data['abilities'] as $ability) {
                $this->userAbilitiesRepository->create([
                    'user_id' => $user->id,
                    'action_id' => $ability['action_id'],
                    'subject_id' => $ability['subject_id']
                ]);
            }

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            DB::commit();
            return [
                'message' => 'Successfully created user!',
                'accessToken' => $token,
            ];
        } catch (\Exception) {
            DB::rollBack();
            throw new \Exception('Falha ao criar funcionario', 500);
        }
    }

    /**
     * @param $user
     * @return array
     * @throws Exception
     */
    public function userFormat($user): array
    {
        $userPresenter = new UserPresenter();
        return $userPresenter->present($user)['data'];
    }

    /**
     * @param $userAbility
     * @return array
     * @throws Exception
     */
    public function userAbilityFormat($userAbility): array
    {
        $userAbilityPresenter = new UserAbilityPresenter();
        return $userAbilityPresenter->present($userAbility)['data'];
    }
}
