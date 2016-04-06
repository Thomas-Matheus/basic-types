<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 05/04/16
 * Time: 01:47
 */

namespace Test\BasicTypes;


use LazyEight\BasicTypes\Stringy;

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
        $str = new Stringy($this->testString);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeConstructedByIntValue()
    {
        $str = new Stringy(1);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeConstructedByTrueBoolValue()
    {
        $str = new Stringy(true);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCanBeCreatedByFalseBoolValue()
    {
        $str = new Stringy(true);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @expectedException \InvalidArgumentException
     * @uses \LazyEight\BasicTypes\String
     */
    public function testCannotBeCreatedFromNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Stringy(null);
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::getValue
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testValueCanBeRetrieved(Stringy $str)
    {
        $this->assertEquals($this->testString, $str->getValue());
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equals
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->equals($this->testString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equals
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->equals($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equalsIgnoreCase
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsIgnoreCaseMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->equalsIgnoreCase($this->testStringIgnoreCase));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::equalsIgnoreCase
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsIgnoreCaseMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->equalsIgnoreCase($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::length
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testLengthMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->length() == mb_strlen($this->testString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::length
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testLengthMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->length() == mb_strlen($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::concat
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     * @return \LazyEight\BasicTypes\Stringy
     */
    public function testConcatMethod(Stringy $str)
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
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testContainsMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->contains($this->testConcatSuffix));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::contains
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testContainsMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->contains($this->testErrorString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodCaseSesitiveOnTrue(Stringy $str)
    {
        $this->assertTrue($str->endsWith($this->testConcatSuffix));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodCaseSesitiveOnFalse(Stringy $str)
    {
        $this->assertFalse($str->endsWith($this->testString));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->endsWith($this->testStringIgnoreCaseSuffix, false));
    }

    /**
     * @covers \LazyEight\BasicTypes\String::__construct
     * @covers \LazyEight\BasicTypes\String::endsWith
     * @depends testCanConstructedByStringValue
     * @uses \LazyEight\BasicTypes\String
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->endsWith($this->testConcatSuffix, false));
    }

}
