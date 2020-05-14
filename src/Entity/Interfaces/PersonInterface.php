<?php
declare(strict_types=1);

namespace App\Entity\Interfaces;

use Ramsey\Uuid\Uuid;

interface PersonInterface
{
    public function getId(): Uuid;
}
