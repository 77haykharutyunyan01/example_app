<?php

namespace App\Http\Requests\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    const LOGIN = 'login';
    const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::LOGIN => [
                'required',
                'string',
            ],

            self::PASSWORD => [
                'required',
                'string',
            ],
        ];
    }

    public function getLogin(): string
    {
     return  $this->get(self::LOGIN);

    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
