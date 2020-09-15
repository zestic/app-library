<?php
declare(strict_types=1);

namespace App\Interactor;

use App\Entity\Interfaces\PersonInterface;

interface FindPersonByIdInterface
{
    public function find($id): ?PersonInterface;
}
