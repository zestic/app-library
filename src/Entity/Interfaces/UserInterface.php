<?php
declare(strict_types=1);

namespace App\Entity\Interfaces;

use Mezzio\Authentication\UserInterface as MezzioInterface;

interface UserInterface extends MezzioInterface
{
    public function getPersonId(): string;
}
