<?php

namespace sisiun\cqrs;

use Illuminate\Support\Facades\App;
use ReflectionClass;
use ReflectionException;

class CommandBus
{
    /**
     * @throws ReflectionException
     */
    public function handle($command): void
    {
        $reflection = new ReflectionClass($command);
        $handlerName = str_replace('Command', 'Handler', $reflection->getShortName());
        $handlerName = str_replace($reflection->getShortName(), $handlerName, $reflection->getName());
        $handler = App::make($handlerName);
        $handler($command);
    }
}
