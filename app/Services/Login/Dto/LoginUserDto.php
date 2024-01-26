<?php

namespace App\Services\Login\Dto;

use App\Http\Requests\Auth\Login\LoginRequest;

class LoginUserDto
{
    public function __construct(
        public string $login,
        public string $password,

    ) {}
    public static function fromRequest(LoginRequest $request): LoginUserDto
    {
        return new self(
            login: $request->getLogin(),
            password: $request->getPassword()
        );
    }
}
