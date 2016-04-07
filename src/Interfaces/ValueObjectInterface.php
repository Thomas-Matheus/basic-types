<?php
/**
 * Created by PhpStorm.
 * User: Victor Ribeiro <victormech@gmail.com>
 * Date: 06/04/16
 */

namespace LazyEight\BasicTypes\Interfaces;


use LazyEight\BasicTypes\Stringy;

interface ValueObjectInterface
{
    /**
     * @return Stringy
     */
    public function getValue();
}