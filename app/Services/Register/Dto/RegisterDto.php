<?php

namespace App\Services\Register\Dto;

use App\Http\Requests\Auth\Register\RegisterRequest;

class RegisterDto
{
    public function __construct(
        public string $name,
        public string $patronymic,
        public string $email,
        public string $lastName,
        public string $password,
        public string $phone
    ) {}

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return new self(
            name: $request->getName(),
            patronymic: $request->getPatronymic(),
            email: $request->getEmail(),
            lastName: $request->getLastName(),
            password: $request->getPassword(),
            phone: $request->getPhone(),
        );
    }
}
