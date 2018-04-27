<?php
declare(strict_types=1);

namespace Common\Jwt;

final class TokenData
{
    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
