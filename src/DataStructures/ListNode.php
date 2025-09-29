<?php

namespace Jknight\PhpExcercises\DataStructures;

class ListNode
{
    public function __construct(
        public string $value,
        public ?ListNode $previous = null,
        public ?ListNode $next = null,
    ) {
        $this->value = $value;
    }
}