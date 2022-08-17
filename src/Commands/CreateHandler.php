<?php

namespace sisiun\cqrs\Commands;


class CreateHandler
{
    public function __invoke($object, CreateCommand $command): void
    {
        foreach ($object->fillable as $item) {
            $object->$item = $command->$item;
        }
        $object->save();
        // other logic
    }
}
