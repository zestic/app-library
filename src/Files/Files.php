<?php
declare(strict_types=1);

namespace App\Files;

use League\Flysystem\Filesystem;

final class Files
{
    public function __construct(
        private Filesystem $filesystem,
        private string $url,
    ) { }

    public function write(string $location, string $contents, array $config = []): FileDTO
    {
        $this->filesystem->write($location, $contents, $config);

        return $this->getFileDTO($location);
    }

    private function getFileDTO(string $location): FileDTO
    {
        $mime = $this->filesystem->mimeType($location);
        $href = $this->url . '/' . $location;

        return new FileDTO($location,  $href, '', $mime);
    }
}
