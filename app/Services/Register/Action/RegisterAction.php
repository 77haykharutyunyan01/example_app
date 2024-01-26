<?php

namespace App\Services\Register\Action;

use App\Models\User;
use App\Repositories\Write\User\UserWriteRepositoryInterface;
use App\Services\Register\Dto\RegisterDto;
use Illuminate\Support\Facades\Http;

class RegisterAction
{
    public function __construct(
        public UserWriteRepositoryInterface $userWriteRepository,
    ) {}

    public function run(RegisterDto $dto)
    {
        $user = User::staticCreate($dto);
        $this->userWriteRepository->save($user);

            $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
                'grant_type' => 'password',
                'client_id' => '9af297c1-9829-446a-9262-c73feaa7f65d',
                'client_secret' => '8x7zRD1QMPFiM8AiNhuweUw2g2nouQ5Cf0oEU1Hl',
                'username' => $user->email,
                'password' => $dto->password,
                'scope' => '*',
            ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
