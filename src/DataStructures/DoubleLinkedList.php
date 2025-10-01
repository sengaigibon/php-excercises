<?php

namespace Jknight\PhpExcercises\DataStructures;

class DoubleLinkedList
{
    public ?ListNode $head = null;
    public ?ListNode $tail = null;

    public function addAtStart(string $value): void
    {
        $newNode = new ListNode($value);

        if (!$this->head) {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }

        $this->head->previous = $newNode;
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function addAtEnd(string $value): void
    {
        $newNode = new ListNode($value);

        if (!$this->tail) {
            $this->head = $newNode;
            $this->tail = $newNode;
            return;
        }

        $this->tail->next = $newNode;
        $newNode->previous = $this->tail;
        $this->tail = $newNode;
    }

    public function traverse(string $direction = 'forward'): string
    {
        switch ($direction) {
            case 'forward':
                $start = $this->head;
                $next = 'next';
                break;
            case 'backward':
                $start = $this->tail;
                $next = 'previous';
                break;
            default:
                return '';
        }

        $currentNode = $start;

        if ($currentNode === null) {
            return '';
        }

        $nodes = [];

        do {
            $nodes[] = $currentNode->value;
        } while ($currentNode = $currentNode->$next);

        return implode(' -> ', $nodes);
    }

    public function removeFirst(): void
    {
        if ($this->head === null) {
            return;
        }

        $currentNode = $this->head;
        if ($this->head = $currentNode->next) {
            $this->head->previous = null;
        }

        if ($this->tail === $currentNode) { // head and tail were pointing to the same node, clean up tail
            $this->tail = null;
        }

        unset($currentNode);
    }

    public function removeLast(): void
    {
        if ($this->tail === null) {
            return;
        }

        $currentNode = $this->tail;
        if ($this->tail = $currentNode->previous) {
            $this->tail->next = null;
        }

        if ($this->head === $currentNode) { // head and tail were pointing to the same node, clean up head
            $this->head = null;
        }

        unset($currentNode);
    }

    public function removeAny(string $value): void
    {
        $node = $this->find($value);

        if ($node === null) {
            return;
        }

        $previous = $node->previous;
        $next = $node->next;

        if ($previous === $next) {
            $this->head = $this->tail = null;
            unset($node, $previous, $next);
            return;
        }

        if ($previous) {
            $previous->next = $next;
        }

        if ($next) {
            $next->previous = $previous;
        }

        if ($this->head === $node) {
            $this->head = $next;
        }

        if ($this->tail === $node) {
            $this->tail = $previous;
        }

        unset($node);
    }

    private function find(string $value): ?ListNode
    {
        $current = $this->head;

        while ($current) {
            if ($current->value === $value) {
                return $current;
            }

            $current = $current->next;
        }

        return null;
    }
}