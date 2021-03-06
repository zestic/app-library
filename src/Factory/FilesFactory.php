<?php
declare(strict_types=1);

namespace App\Factory;

use App\Files\Files;
use Aws\S3\S3Client;
use ConfigValue\GatherConfigValues;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;
use Psr\Container\ContainerInterface;

final class FilesFactory
{
    public function __construct(
        private string $system,
    ) { }

    public function __invoke(ContainerInterface $container): Files
    {
        $filesConfig = (new GatherConfigValues)($container, 'files');
        $config = $filesConfig[$this->system];
        $flysystem = $container->get($config['flysystem']);

        return new Files($flysystem, $config['url']);
    }
}
