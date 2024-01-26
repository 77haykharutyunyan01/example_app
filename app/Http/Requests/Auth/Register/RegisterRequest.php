<?php

namespace App\Http\Requests\Auth\Register;

use App\Traits\Auth\AuthIdTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use AuthIdTrait;

    public const NAME = 'name';
    public const LAST_NAME = 'lastName';
    public const PATRONYMIC = 'patronymic';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const PASSWORD = 'password';
    public const PASSWORD_CONFIRMATION = 'password_confirmation';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],
            self::LAST_NAME => [
                'required',
                'string',
            ],
            self::PATRONYMIC => [
                'required',
                'string',
            ],
            self::EMAIL => [
                'required',
                'email',
                'string',
            ],
            self::PHONE => [
                'required',
                'regex:/^\+?[0-9]{1,4}-?[0-9]{6,}$/',
            ],
            self::PASSWORD => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getLastName(): string
    {
        return $this->get(self::LAST_NAME);
    }

    public function getPatronymic(): string
    {
        return $this->get(self::PATRONYMIC);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPhone(): int
    {
        return $this->get(self::PHONE);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
