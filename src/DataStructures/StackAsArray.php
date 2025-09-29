<?php

namespace Jknight\PhpExcercises\DataStructures;

use Jknight\PhpExcercises\Base\StackInterface;

class StackAsArray implements StackInterface
{
    private array $stack = [];

    public function push(string $name): void
    {
        $this->stack[] = $name;
    }

    public function pop(): ?string
    {
        return array_pop($this->stack);
    }

    public function peek(): ?string
    {
        if (empty($this->stack)) {
            return null;
        }
        return $this->stack[count($this->stack) - 1];
    }
}