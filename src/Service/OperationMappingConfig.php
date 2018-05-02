<?php
declare(strict_types=1);

namespace App\Service;

use Common\Communique\Communique;
use Common\Communique\ServiceHandlerInterface;

class OperationMappingConfig
{
    protected $map;

    public function getService(Communique $communique): ServiceHandlerInterface
    {
        return $this->map[$communique->getOperation()];
    }
}
