<?php

namespace Tests\Exceptions;

use PHPUnit\Framework\TestCase;
use Src\Exceptions\BodyExceptions\DataException;
use Src\Exceptions\BodyExceptions\DataEmptyException;

class ExceptionTest extends TestCase
{
    private const DATA_EMPTY = "is empty";

    /** @test*/
    public function no_es_array(): void
    {
        $array = '';
        if (!is_array($array)) {
            $this->expectException(DataException::class);
            throw DataException::create(self::DATA_EMPTY);
        }
    }

    /** @test*/
    public function data_empty(): void
    {
        $array = [];
        if (empty($array)) {
            $this->expectException(DataEmptyException::class);
            throw DataEmptyException::create(self::DATA_EMPTY);
        }
    }
}
