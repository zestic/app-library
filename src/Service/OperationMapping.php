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

    /**
     * @param $service
     * @param $fieldName
     * @return \GraphQLMiddleware\Resolver\ResolverInterface
     * @throws ResolveException
     */
    private function getResolverService($service, $fieldName) {

        $service = $this->getServiceName($service);

        if (!$this->container->has($service)) {
            throw new ResolveException(sprintf('Resolve service "%s" not found for field "%s"', $service, $fieldName));
        }

        $serviceInstance = $this->container->get($service);

        if (!in_array(ResolverInterface::class, class_implements($service))) {
            throw new ResolveException(sprintf('Resolver service "%s" for field "%s" must implement interface "%s"', $service, $fieldName, ResolverInterface::class));
        }

        return $serviceInstance;
    }
}
