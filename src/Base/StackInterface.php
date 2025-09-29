<?php

namespace Jknight\PhpExcercises\Base;

interface StackInterface
{
    public function push(string $name): void;

    public function pop(): ?string;

    public function peek(): ?string;
}