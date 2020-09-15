<?php
declare(strict_types=1);

namespace App\Interactor;

use App\Entity\Interfaces\PersonInterface;

interface CreatePersonInterface
{
    public function create($data = null): PersonInterface;
}
