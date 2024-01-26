<?php

namespace App\Models;

use App\Services\Register\Dto\RegisterDto;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


/**
 * App\Models\Auth
 *
 * @property string $id;
 * @property string $name;
 * @property string $lastName;
 * @property string $patronymic;
 * @property string $email;
 * @property string $phone;
 * @property string $password;
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastName',
        'patronymic',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function staticCreate(RegisterDto $dto): User
    {
        $user = new self();

        $user->setName($dto->name);
        $user->setLastName($dto->lastName);
        $user->setPatronymic($dto->patronymic);
        $user->setEmail($dto->email);
        $user->setPhone($dto->phone);
        $user->setPassword($dto->password);

        return $user;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setPatronymic(string $patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setPassword(string $password): void
    {
        $this->password = bcrypt($password);
    }


}
