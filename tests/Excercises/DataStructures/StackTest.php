<?php

namespace Excercises\DataStructures;

use Jknight\PhpExcercises\Base\StackInterface;
use Jknight\PhpExcercises\DataStructures\StackAsArray;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Jknight\PhpExcercises\DataStructures\Stack;

class StackTest extends TestCase
{
    #[DataProvider('dataProviderForStack')]
    public function testStack(StackInterface $stack)
    {
        $stack->push('a1');
        $stack->push('a2');
        $stack->push('a3');
        $stack->push('a4');
        $stack->push('a5');

        $this->assertEquals('a5', $stack->pop());
        $this->assertEquals('a4', $stack->pop());

        $this->assertEquals('a3', $stack->peek());

        $this->assertEquals('a3', $stack->pop());
        $this->assertEquals('a2', $stack->pop());

        $this->assertEquals('a1', $stack->peek());
        $this->assertEquals('a1', $stack->pop());
        $this->assertEquals(null, $stack->pop());
        $this->assertEquals(null, $stack->peek());

    }

    public static function dataProviderForStack(): \Generator
    {
        yield [new Stack()];
        yield [new StackAsArray()];
    }

}

