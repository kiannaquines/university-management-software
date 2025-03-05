<?php

namespace App\Domains\User\Entities;

class User {
    /**
     * @var string|null
     */
    public ?string $id {
        get => $this->id;
        set(?string $id) => $this->id = $id;
    }
    /**
     * @var string
     */
    public string $username {
        get => $this->username;
        set(string $username) => $this->username = $username;
    }
    /**
     * @var string
     */
    public string $email {
        get => $this->email;
        set(string $email) => $this->email = $email;
    }
    /**
     * @var string|null
     */
    public ?string $password {
        get => $this->password;
        set(?string $password) => $this->password = $password;
    }
    /**
     * @var string|null
     */
    public ?string $confirmPassword {
        get => $this->confirmPassword;
        set(?string $confirmPassword) => $this->confirmPassword = $confirmPassword;
    }

    public function __construct(
        string $username,
        string $email,
        ?string $id = null,
        ?string $password = null,
        ?string $confirmPassword = null
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->id = $id;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

}
