<?php

namespace Tests\One;

use PHPUnit\Framework\TestCase;


class OneTest extends TestCase
{

    public function testOne(): void
    {
        $fun = hello("Mundo");
        $this->assertEquals("Hello, Mundo!", $fun);
    }
}
