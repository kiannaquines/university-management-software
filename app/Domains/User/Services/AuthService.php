<?php

namespace App\Domains\User\Services;

use App\Domains\User\Interfaces\IAuthService;

class AuthService implements IAuthService
{

    public function register(array $data): bool
    {
        return true;
    }

    public function login(array $data): string|null
    {
        return null;
    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }

    public function verifyUser(string $token): bool
    {
        return true;
    }
}
