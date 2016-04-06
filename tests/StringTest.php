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
    protected $testStringSuffix = 'RING';

    /**
     * @var string
     */
    protected $testErrorString = 'ERROR STRING';

    /**
     * @var string
     */
    protected $testStringIgnoreCase = 'teST strING';

    /**
     * @var string
     */
    protected $testStringIgnoreCaseSuffix = 'rING';

    /**
     * @var string
     */
    protected $testConcatFinalResult = 'TEST STRING CONCAT';

    /**
     * @var string
     */
    protected $testConcatSuffix = ' CONCAT';

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanConstructedByStringValue()
    {
        $str = new String($this->testString);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeConstructedByIntValue()
    {
        $str = new String(1);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeConstructedByTrueBoolValue()
    {
        $str = new String(true);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeCreatedByFalseBoolValue()
    {
        $str = new String(true);
        $this->assertInstanceOf(String::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
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
     * @param \LazyEight\BasicTypes\String $str
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
     * @param \LazyEight\BasicTypes\String $str
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
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEqualsMethodOnFalse(String $str)
    {
        $this->assertFalse($str->equals($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equalsIgnoreCase
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEqualsIgnoreCaseMethodOnTrue(String $str)
    {
        $this->assertTrue($str->equalsIgnoreCase($this->testStringIgnoreCase));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equalsIgnoreCase
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEqualsIgnoreCaseMethodOnFalse(String $str)
    {
        $this->assertFalse($str->equalsIgnoreCase($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::length
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testLengthMethodOnTrue(String $str)
    {
        $this->assertTrue($str->length() == mb_strlen($this->testString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::length
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testLengthMethodOnFalse(String $str)
    {
        $this->assertFalse($str->length() == mb_strlen($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::concat
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     * @return \LazyEight\BasicTypes\String
     */
    public function testConcatMethod(String $str)
    {
        $strTest = $str->concat($this->testConcatSuffix);
        $this->assertEquals($this->testConcatFinalResult, $strTest);
        return $strTest;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::contains
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testContainsMethodOnTrue(String $str)
    {
        $this->assertTrue($str->contains($this->testConcatSuffix));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::contains
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testContainsMethodOnFalse(String $str)
    {
        $this->assertFalse($str->contains($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEndWithMethodCaseSesitiveOnTrue(String $str)
    {
        $this->assertTrue($str->endsWith($this->testConcatSuffix));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEndWithMethodCaseSesitiveOnFalse(String $str)
    {
        $this->assertFalse($str->endsWith($this->testString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEndWithMethodOnTrue(String $str)
    {
        $this->assertTrue($str->endsWith($this->testStringIgnoreCaseSuffix, false));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\String $str
     */
    public function testEndWithMethodOnFalse(String $str)
    {
        $this->assertFalse($str->endsWith($this->testConcatSuffix, false));
    }

}
