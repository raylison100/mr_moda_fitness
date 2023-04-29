<?php

namespace App\Services;

use App\Entities\User;
use App\Presenters\UserAbilityPresenter;
use App\Presenters\UserPresenter;
use App\Repositories\UserAbilitiesRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
                'password' => bcrypt("12345678")
            ]);

            $this->setUserAbilities($data['abilities'], $user);

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

    /**
     * @param array $data
     * @param int $id
     * @return array
     * @throws Exception
     */
    public function updateUser(array $data, int $id): array
    {
        try {
            DB::beginTransaction();
            $user = $this->repository->skipPresenter()->find($id);

            $this->userAbilitiesRepository->where('user_id', $user->id)->delete();

            $this->setUserAbilities($data['abilities'], $user);

            DB::commit();
            return [
                'message' => 'Successfully updated user!',
            ];
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            throw new \Exception('Falha ao atualizar funcionario', 500);
        }
    }

    /**
     * @param array $abilities
     * @param User $user
     * @return void
     */
    private function setUserAbilities(array $abilities, User $user): void
    {
        collect($abilities)
            ->each(function ($ability) use ($user) {
                collect($ability['actions'])
                    ->each(function ($action) use ($user, $ability) {
                        $this->userAbilitiesRepository->create([
                            'user_id' => $user->id,
                            'action_id' => $action['id'],
                            'subject_id' => $ability['subject_id']
                        ]);
                    });
            });
    }
}
