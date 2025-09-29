<?php

namespace Jknight\PhpExcercises\DataStructures;

class Item
{
    public ?Item $previous;
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->previous = null;
    }
}