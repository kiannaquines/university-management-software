<?php

namespace App\Domains\User\Interfaces;

interface IAuthService
{
    public function register(array $data): bool;
    public function login(array $data): string|null;
    public function logout(): void;
    public function verifyUser(string $token): bool;
}
