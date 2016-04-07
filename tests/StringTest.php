<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 05/04/16
 * Time: 01:47
 */

namespace Test\BasicTypes;


use LazyEight\BasicTypes\Stringy;
use LazyEight\BasicTypes\Exceptions\IndexOutOfBoundsException;

class StringyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $defaultStringy = 'TEST STRING';

    /**
     * @var string
     */
    protected $stringyPrefix = 'TEST';

    /**
     * @var string
     */
    protected $stringySuffix = 'RING';

    /**
     * @var string
     */
    protected $stringyLowerCase = 'test string';

    /**
     * @var string
     */
    protected $errorStringy = 'ERROR STRING';

    /**
     * @var string
     */
    protected $ignoreCase = 'teST strING';

    /**
     * @var string
     */
    protected $ignoreCaseSuffix = 'rING';

    /**
     * @var string
     */
    protected $concatFinalResult = 'TEST STRING CONCAT';

    /**
     * @var string
     */
    protected $concatSuffix = ' CONCAT';

    /**
     * @var string
     */
    protected $trimTest = ' ABC ';

    /**
     * @var string
     */
    protected $trimmedTest = 'ABC';

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @uses \LazyEight\BasicTypes\Stringy
     * @return \LazyEight\BasicTypes\Stringy
     */
    public function testCanConstructedByStringyValue()
    {
        $str = new Stringy($this->defaultStringy);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testCanBeConstructedByIntValue()
    {
        $str = new Stringy(1);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testCanBeConstructedByTrueBoolValue()
    {
        $str = new Stringy(true);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testCanBeCreatedByFalseBoolValue()
    {
        $str = new Stringy(true);
        $this->assertInstanceOf(Stringy::class, $str);
        return $str;
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @expectedException \InvalidArgumentException
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testCannotBeCreatedFromNull()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Stringy(null);
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::getValue
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testValueCanBeRetrieved(Stringy $str)
    {
        $this->assertEquals($this->defaultStringy, $str->getValue());
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::equals
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->equals($this->defaultStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::equals
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->equals($this->errorStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::equalsIgnoreCase
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsIgnoreCaseMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->equalsIgnoreCase($this->ignoreCase));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::equalsIgnoreCase
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEqualsIgnoreCaseMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->equalsIgnoreCase($this->errorStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::length
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testLengthMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->length() == mb_strlen($this->defaultStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::length
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testLengthMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->length() == mb_strlen($this->errorStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::concat
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     * @return \LazyEight\BasicTypes\Stringy
     */
    public function testConcatMethod(Stringy $str)
    {
        $strTest = $str->concat($this->concatSuffix);
        $this->assertEquals($this->concatFinalResult, $strTest);
        return $strTest;
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::contains
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testContainsMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->contains($this->concatSuffix));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::contains
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testContainsMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->contains($this->errorStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::endsWith
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndsWith(Stringy $str)
    {
        $this->assertTrue($str->endsWith($this->stringySuffix));
        $this->assertFalse($str->endsWith($this->ignoreCaseSuffix));
        $this->assertTrue($str->endsWith($this->ignoreCaseSuffix, false));
        $this->assertFalse($str->endsWith($this->concatSuffix, false));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::startsWith
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testStartsWith(Stringy $str)
    {
        $this->assertTrue($str->startsWith($this->stringyPrefix));
        $this->assertFalse($str->startsWith($this->stringySuffix));
        $this->assertTrue($str->startsWith($this->stringySuffix, 7));
        $this->assertFalse($str->startsWith($this->stringySuffix, 1));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::charAt
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @expectedException \LazyEight\BasicTypes\Exceptions\IndexOutOfBoundsException
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testChartAt(Stringy $str)
    {
        $indexToSearch = 3;
        $this->assertEquals($str->charAt($indexToSearch), mb_substr($str->getValue(), $indexToSearch, 1));
        $this->assertNotEquals($str->charAt($indexToSearch), mb_substr($str->getValue(), 1, 1));

        $this->expectException(IndexOutOfBoundsException::class);
        $str->charAt($str->length() + 1);
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::indexOf
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testIndexOf(Stringy $str)
    {
        $offSet = 4;
        $suffixIndexStarts = mb_strpos($str->getValue(), $this->stringySuffix);
        $prefixIndexStarts = mb_strpos($str->getValue(), $this->stringyPrefix);
        $suffixIndexStartsOffSet = mb_strpos($str->getValue(), $this->stringySuffix, $offSet);

        $this->assertEquals($str->indexOf($this->stringySuffix), $suffixIndexStarts);
        $this->assertNotEquals($str->indexOf($this->stringySuffix), $prefixIndexStarts);
        $this->assertEquals($str->indexOf($this->stringySuffix, $offSet), $suffixIndexStartsOffSet);
        $this->assertNotEquals($str->indexOf($this->stringySuffix, $offSet), $prefixIndexStarts);
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::isEmpty
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testisEmpty(Stringy $str)
    {
        $emptyString = new Stringy('');
        $this->assertFalse($str->isEmpty());
        $this->assertTrue($emptyString->isEmpty());
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::toLowerCase
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testToLowerCase(Stringy $str)
    {
        $this->assertEquals($str->toLowerCase(), $this->stringyLowerCase);
        $this->assertNotEquals($str->toLowerCase(), $this->defaultStringy);
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::toUpperCase
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testToUpperCase()
    {
        $strToBeUpperCase = new Stringy($this->stringyLowerCase);
        $this->assertEquals($strToBeUpperCase->toUpperCase(), $this->defaultStringy);
        $this->assertNotEquals($strToBeUpperCase->toUpperCase(), $this->stringyLowerCase);
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::trim
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testTrim()
    {
        $strToBeTrimmed = new Stringy($this->trimTest);
        $this->assertEquals($strToBeTrimmed->trim(), $this->trimmedTest);
        $this->assertNotEquals($strToBeTrimmed->trim(), $this->trimTest);
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::__toString
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testToString(Stringy $str)
    {
        $this->assertEquals($str->__toString(), $this->defaultStringy);
        $this->assertNotEquals($str->__toString(), $this->errorStringy);
    }
}
