<?php
declare(strict_types=1);

namespace App\Entity;

use Ramsey\Uuid\Uuid;

trait IdTrait
{
    /** @var Uuid */
    protected $id;

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getIdAsBinary(): string
    {
        return $this->id->getBytes();
    }

    public function getIdAsString(): string
    {
        return $this->id->gethex()->toString();
    }
}
