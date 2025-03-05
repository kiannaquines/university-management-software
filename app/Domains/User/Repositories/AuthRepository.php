<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Interfaces\IAuthRepository;
use App\Domains\User\Entities\User as UserEntity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthRepository implements IAuthRepository
{
    /**
     * @param string $email
     * @return UserEntity
     * @throws Exception
     */
    public function findUserByEmail(string $email): UserEntity
    {
        try{
            $result = DB::table('users')->where('email', $email)->first();
            return new UserEntity(
                username: $result->username,
                email: $result->email,
            );
        } catch (Exception $e) {
            throw new Exception('User not found'. $e->getMessage());
        }
    }

    public function hashPassword(string $password): string
    {
        return Hash::make($password);
    }

    public function verifyPassword(string $password, string $hashedPassword): bool
    {
        return Hash::check($password, $hashedPassword);
    }

    public function isVerifiedEmail(string $email) : bool
    {
        return true;
    }
}
