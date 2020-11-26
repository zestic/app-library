<?php
declare(strict_types=1);

namespace App\Interfaces;

interface NewUserInterface
{
    public function getEmail(): string;
    public function getPassword(): string;
    public function getUsername(): string;
}
