<?php

namespace Excercises\DataStructures;

use Jknight\PhpExcercises\DataStructures\DoubleLinkedList;
use PHPUnit\Framework\TestCase;

class LinkedLists extends TestCase
{
    public function testAddAtStart(): void
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
    }

    public function testRemove(): void
    {
        $list = new DoubleLinkedList();

        $list->addAtStart('a1');
        $list->addAtStart('a2');
        $list->addAtStart('a3');
        $list->addAtStart('a4');
        $list->addAtStart('a5');
        $list->addAtStart('a6');

        $list->removeFirst();
        $this->assertEquals('a5 -> a4 -> a3 -> a2 -> a1', $list->traverse());

        $list->removeLast();
        $this->assertEquals('a5 -> a4 -> a3 -> a2', $list->traverse());
    }

    public function testAddAtEnd(): void
    {
        $list = new DoubleLinkedList();

        $list->addAtEnd('a1');
        $list->addAtEnd('a2');
        $list->addAtEnd('a3');
        $list->addAtEnd('a4');
        $list->addAtEnd('a5');
        $list->addAtEnd('a6');

        $this->assertEquals('a1 -> a2 -> a3 -> a4 -> a5 -> a6', $list->traverse());
        $this->assertEquals('a6 -> a5 -> a4 -> a3 -> a2 -> a1', $list->traverse('backward'));
    }

    public function testRemoveAny(): void
    {
        $list = new DoubleLinkedList();

        $list->addAtEnd('a1');
        $list->addAtEnd('a2');
        $list->addAtEnd('a3');
        $list->addAtEnd('a4');
        $list->addAtEnd('a5');
        $list->addAtEnd('a6');

        $this->assertEquals('a1 -> a2 -> a3 -> a4 -> a5 -> a6', $list->traverse());
        $this->assertEquals('a6 -> a5 -> a4 -> a3 -> a2 -> a1', $list->traverse('backward'));

        $list->removeAny('a5');

        $this->assertEquals('a1 -> a2 -> a3 -> a4 -> a6', $list->traverse());
        $this->assertEquals('a6 -> a4 -> a3 -> a2 -> a1', $list->traverse('backward'));

        $list->removeAny('a1');
        $this->assertEquals('a2 -> a3 -> a4 -> a6', $list->traverse());
        $this->assertEquals('a6 -> a4 -> a3 -> a2', $list->traverse('backward'));

        $list->removeAny('a3');
        $this->assertEquals('a2 -> a4 -> a6', $list->traverse());
        $this->assertEquals('a6 -> a4 -> a2', $list->traverse('backward'));

        $list->removeAny('a4');
        $this->assertEquals('a2 -> a6', $list->traverse());
        $this->assertEquals('a6 -> a2', $list->traverse('backward'));

        $list->removeAny('a6');
        $this->assertEquals('a2', $list->traverse());
        $this->assertEquals('a2', $list->traverse('backward'));

        $list->removeAny('a2');
        $this->assertEquals('', $list->traverse());
        $this->assertEquals('', $list->traverse('backward'));
    }

    public function testRemoveLastWhenTheresOnlyOneNode(): void
    {
        $list = new DoubleLinkedList();
        $list->addAtEnd('a1');

        $this->assertEquals('a1', $list->traverse());
        $this->assertEquals('a1', $list->traverse('backward'));

        $list->removeLast();
        $this->assertEquals('', $list->traverse());
        $this->assertEquals('', $list->traverse('backward'));
    }

    public function testRemoveFirstWhenTheresOnlyOneNode(): void
    {
        $list = new DoubleLinkedList();
        $list->addAtEnd('a1');

        $this->assertEquals('a1', $list->traverse());
        $this->assertEquals('a1', $list->traverse('backward'));

        $list->removeFirst();
        $this->assertEquals('', $list->traverse());
        $this->assertEquals('', $list->traverse('backward'));
    }
}

