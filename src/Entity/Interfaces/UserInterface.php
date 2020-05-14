<?php
declare(strict_types=1);

namespace App\Entity\Interfaces;

use Mezzio\Authentication\UserInterface as MezzioInterface;

use Ramsey\Uuid\Uuid;

interface UserInterface extends MezzioInterface
{
    public function getCredential();
    public function getPersonId(): Uuid;
}
