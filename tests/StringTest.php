<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 05/04/16
 * Time: 01:47
 */

namespace Test\BasicTypes;


use LazyEight\BasicTypes\String;

class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \LazyEight\BasicTypes\String\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanConstructedByStringValue()
    {
        $str = new String('TEST STRING');
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeConstructedByIntValue()
    {
        $str = new String(1);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeConstructedByTrueBoolValue()
    {
        $str = new String(true);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    public function testCanBeCreatedByFalseBoolValue()
    {
        $str = new String(true);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function textCannotBeCreatedFromNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        new String(null);
    }

}
