<?php
declare(strict_types=1);

namespace App\Entity;

final class Paginate
{
    private int $startIndex;
    private int $stopIndex;

    public function getBatchSize(): int
    {
        return $this->stopIndex - $this->startIndex + 1;
    }

    public function getStartIndex(): int
    {
        return $this->startIndex;
    }

    public function setStartIndex(int $startIndex): Paginate
    {
        $this->startIndex = $startIndex;

        return $this;
    }

    public function getStopIndex(): int
    {
        return $this->stopIndex;
    }

    public function setStopIndex(int $stopIndex): Paginate
    {
        $this->stopIndex = $stopIndex;

        return $this;
    }
}
