<?php

namespace App\Services\Login\Action;

use App\Models\User;
use App\Services\Login\Dto\LoginUserDto;
use Illuminate\Support\Facades\Http;

class LoginAction
{
    public function run(LoginUserDto $dto)
    {
        if (strpos($dto->login, '@') !== false) {
            $user = User::query()
                ->where('email', $dto->login)
                ->first();
        } else {
            $user = User::query()
                ->where('phone',$dto->login)
                ->first();
        }

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
