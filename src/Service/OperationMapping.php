<?php
declare(strict_types=1);

namespace App\Service;

use Common\Communique\Communique;
use Common\Communique\Reply;
use Common\Communique\ServiceHandlerInterface;

class OperationMapping implements ServiceHandlerInterface
{
    protected $mappingConfig;

    public function __construct(OperationMappingConfig $mappingConfig)
    {
        $this->mappingConfig = $mappingConfig;
    }

    public function handle(Communique $communique): Reply
    {
        $service = $this->mappingConfig->getService($communique);

        return $service->handle($communique);
    }
}
