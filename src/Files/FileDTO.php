<?php
declare(strict_types=1);

namespace App\Files;

readonly class FileDTO
{
    public string $id;

    public function __construct(
        public string $href,
        public ?string $mediaType = null,
        public string $name,
    ) {
        $this->id = substr($name, 0, strpos($name, '.'));
    }
}
