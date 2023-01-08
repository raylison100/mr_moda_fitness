<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use Exception;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\RepositoryInterface;

class AuthService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(
        UserRepository $repository,
    ) {
        $this->repository = $repository;
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

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return [
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'userData' => $this->user($user),
            'userAbilities' => [
                [
                    'action' => 'read',
                    'subject' => 'Auth'
                ],
                [
                    'action' => 'read',
                    'subject' => 'Sales'
                ]
            ]
        ];
    }

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function register(array $data): array
    {
        $user = $this->repository->skipPresenter()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if ($user) {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            return [
                'message' => 'Successfully created user!',
                'accessToken' => $token,
            ];
        } else {
            throw new Exception('Provide proper details');
        }
    }

    /**
     * @param $user
     * @return array
     */
    public function user($user): array
    {
        $transformer = new UserTransformer();
        return $transformer->transform($user);
    }
}
