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
     * @var string
     */
    protected $testString = 'TEST STRING';

    /**
     * @var string
     */
    protected $testErrorString = 'ERROR STRING';
    /**
     * @covers \LazyEight\BasicTypes\String\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanConstructedByStringValue()
    {
        $str = new String($this->testString);
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
    public function testCannotBeCreatedFromNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        new String(null);
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::getValue
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String str
     */
    public function testValueCanBeRetrieved(String $str)
    {
        $this->assertEquals($this->testString, $str->getValue());
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equals
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String str
     */
    public function testEqualsMethodOnTrue(String $str)
    {
        $this->assertTrue($str->equals($this->testString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equals
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String str
     */
    public function testEqualsMethodOnFalse(String $str)
    {
        $this->assertFalse($str->equals($this->testErrorString));
    }
}
