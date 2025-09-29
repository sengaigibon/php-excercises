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

class Stack
{
    private ?Item $top = null;

    public function push(string $name): void
    {
        $newItem = new Item($name);
        if ($this->top === null) {
            $this->top = $newItem;
            return;
        }

        $currentAtTop = $this->top;
        $newItem->previous = $currentAtTop;
        $this->top = $newItem;
    }

    public function pop(): ?string
    {
        if ($this->top === null) {
            return null;
        }

        $currentAtTop = $this->top;
        $this->top = $currentAtTop->previous;

        return $currentAtTop->name;
    }

    public function peek(): ?string
    {
        if ($this->top === null) {
            return null;
        }

        return $this->top->name;
    }
}