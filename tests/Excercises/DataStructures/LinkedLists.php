<?php

namespace Excercises\DataStructures;

use Jknight\PhpExcercises\DataStructures\DoubleLinkedList;
use PHPUnit\Framework\TestCase;

class LinkedLists extends TestCase
{
    public function testListFunctions(): void
    {
        $list = new DoubleLinkedList();

        $list->addAtStart('a1');
        $list->addAtStart('a2');
        $list->addAtStart('a3');
        $list->addAtStart('a4');
        $list->addAtStart('a5');
        $list->addAtStart('a6');

        $this->assertEquals('a6 -> a5 -> a4 -> a3 -> a2 -> a1', $list->traverse());
        $this->assertEquals('a1 -> a2 -> a3 -> a4 -> a5 -> a6', $list->traverse('backward'));

        $list->removeFirst();
        $this->assertEquals('a5 -> a4 -> a3 -> a2 -> a1', $list->traverse());

        $list->removeLast();
        $this->assertEquals('a5 -> a4 -> a3 -> a2', $list->traverse());
    }

}

