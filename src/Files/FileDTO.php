<?php
declare(strict_types=1);

namespace App\Files;

readonly class FileDTO
{
    public string $id;

    public function __construct(
        public string $filename,
        public string $href,
        public string $name = '',
        public ?string $mediaType = null,
    ) {
        $this->id = substr($filename, 0, strpos($filename, '.'));
    }
}
