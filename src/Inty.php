<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 09/04/16
 * Time: 01:14
 */

namespace LazyEight\BasicTypes;


use LazyEight\BasicTypes\Interfaces\ValueObjectInterface;

class Inty implements ValueObjectInterface
{
    private $value;

    /**
     * @param int $value
     */
    public function __construct($value)
    {
        $this->value = (int) $value;
    }

    /**
     * int
     */
    public function getValue()
    {
        // TODO: Implement getValue() method.
    }

}