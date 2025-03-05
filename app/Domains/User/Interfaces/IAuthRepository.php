<?php

namespace App\Domains\User\Interfaces;

use App\Domains\User\Entities\User as UserEntity;

interface IAuthRepository
{
    /**
     * @param string $email
     * @return UserEntity
     */
    public function findUserByEmail(string $email) : UserEntity;

    /**
     * @param string $password
     * @return string
     */
    public function hashPassword(string $password) : string;

    /**
     * @param string $password
     * @param string $hashedPassword
     * @return bool
     */
    public function verifyPassword(string $password, string $hashedPassword) : bool;

    public function isVerifiedEmail(string $email) : bool;
}
