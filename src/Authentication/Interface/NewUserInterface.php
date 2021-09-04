<?php
declare(strict_types=1);

namespace App\Authentication\Interface;

interface NewUserInterface
{
    public function getEmail(): string;
    public function getPassword(): string;
    public function getUsername(): string;
}
