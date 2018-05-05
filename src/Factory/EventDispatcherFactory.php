<?php
declare(strict_types=1);

namespace App\Factory;

use Psr\Container\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class EventDispatcherFactory
{
    public function __invoke(ContainerInterface $container): EventDispatcher
    {
        $config = $container->get('config');
        $events = $config['eventListener'];
        $dispatcher = new EventDispatcher();
        foreach ($events as $eventClass => $classEvents) {
            foreach ($classEvents as $step => $listeners) {
                $eventName = $eventClass . '.' . $step;
                foreach ($listeners as $listener => $method) {
                    $dispatcher->addListener($eventName, [$container->get($listener), $method]);
                }
            }
        }
        return $dispatcher;
    }
}
