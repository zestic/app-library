<?php
declare(strict_types=1);

namespace App\Entity\Interfaces;

use Ramsey\Uuid\Uuid;

interface UserInterface extends IdInterface
{
    public function getCredential();
    public function getIdentity();
    public function getPersonId(): Uuid;
}
