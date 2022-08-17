<?php

namespace sisiun\cqrs\Commands;

/**
 *
 */
class CreateCommand
{

    public function __construct($data)
    {
        $this->setItems($data);

    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function setItems($data)
    {
        foreach ($data as $key => $item) {
            $this->$key = $item;
        }
    }


}
