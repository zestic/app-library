<?php
declare(strict_types=1);

namespace App\Entity\Interfaces;

use Ramsey\Uuid\Uuid;

interface IdInterface
{
    public function getId(): Uuid;
}
