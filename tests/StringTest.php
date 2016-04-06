<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 05/04/16
 * Time: 01:47
 */

namespace Test\BasicTypes;


use LazyEight\BasicTypes\Stringy;

class StringyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $testStringy = 'TEST STRING';

    /**
     * @var string
     */
    protected $testStringySuffix = 'RING';

    /**
     * @var string
     */
    protected $testErrorStringy = 'ERROR STRING';

    /**
     * @var string
     */
    protected $testStringyIgnoreCase = 'teST strING';

    /**
     * @var string
     */
    protected $testStringyIgnoreCaseSuffix = 'rING';

    /**
     * @var string
     */
    protected $testConcatFinalResult = 'TEST STRING CONCAT';

    /**
     * @var string
     */
    protected $testConcatSuffix = ' CONCAT';

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @uses \LazyEight\BasicTypes\Stringy
     */
    public function testCanConstructedByStringyValue()
    {
        $str = new Stringy($this->testStringy);
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
        $this->assertEquals($this->testStringy, $str->getValue());
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
        $this->assertTrue($str->equals($this->testStringy));
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
        $this->assertFalse($str->equals($this->testErrorStringy));
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
        $this->assertTrue($str->equalsIgnoreCase($this->testStringyIgnoreCase));
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
        $this->assertFalse($str->equalsIgnoreCase($this->testErrorStringy));
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
        $this->assertTrue($str->length() == mb_strlen($this->testStringy));
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
        $this->assertFalse($str->length() == mb_strlen($this->testErrorStringy));
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
        $strTest = $str->concat($this->testConcatSuffix);
        $this->assertEquals($this->testConcatFinalResult, $strTest);
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
        $this->assertTrue($str->contains($this->testConcatSuffix));
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
        $this->assertFalse($str->contains($this->testErrorStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::endsWith
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodCaseSesitiveOnTrue(Stringy $str)
    {
        $this->assertTrue($str->endsWith($this->testConcatSuffix));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::endsWith
     * @depends testConcatMethod
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodCaseSesitiveOnFalse(Stringy $str)
    {
        $this->assertFalse($str->endsWith($this->testStringy));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::endsWith
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodOnTrue(Stringy $str)
    {
        $this->assertTrue($str->endsWith($this->testStringyIgnoreCaseSuffix, false));
    }

    /**
     * @covers \LazyEight\BasicTypes\Stringy::__construct
     * @covers \LazyEight\BasicTypes\Stringy::endsWith
     * @depends testCanConstructedByStringyValue
     * @uses \LazyEight\BasicTypes\Stringy
     * @param \LazyEight\BasicTypes\Stringy $str
     */
    public function testEndWithMethodOnFalse(Stringy $str)
    {
        $this->assertFalse($str->endsWith($this->testConcatSuffix, false));
    }

}
