<?php

namespace sisiun\cqrs;

use ReflectionClass;
use ReflectionException;

class CommandBus
{
    /**
     * @throws ReflectionException
     */
    public function handle($object , $command): void
    {
        $reflection = new ReflectionClass($command);
        $handlerName = str_replace('Command', 'Handler', $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        $handler = new ($handlerName);
        $handler($object, $command);
    }
}
