<?php
/**
 * Created by PHP 5.6 generator
 * User: Victor Ribeiro <victormech@gmail.com>
 * PHP 5.6 generator created by Victor MECH - April 2016
*/

namespace LazyEight\BasicTypes;


class String
{

    /*
     * @var string
     */
    private $value;

    /**
     * @param string $str
     * @throws \InvalidArgumentException
     */
    public function __construct($str)
    {
        if (is_null($str)) {
            throw new \InvalidArgumentException('Found null when string was expected');
        }
        $this->value = (string) $str;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Compares this string to the specified object. The result is true if and only if the
     * argument is not null and is a String object that represents the same sequence of
     * characters as this object.
     *
     * @param string $stringToCompare
     * @return bool
     */
    public function equals($stringToCompare)
    {
        return $this->value == $stringToCompare;
    }

    /**
     * Compares this String to another String, ignoring case considerations.
     * Two strings are considered equal ignoring case if they are of the same length
     * and corresponding characters in the two strings are equal ignoring case.
     *
     * Two characters c1 and c2 are considered the same ignoring case if at least one of the
     * following is true:
     * The two characters are the same (as compared by the == operator)
     * Applying the method String.toUpperCase(char) to each character produces the same result
     * Applying the method String.toLowerCase(char) to each character produces the same result
     * Returns:
     * true if the argument is not null and it represents an equivalent String ignoring case;
     * false otherwise
     *
     * @param string $anotherString
     * @return bool
     */
    public function equalsIgnoreCase($anotherString)
    {
        return $this->toLowerCase()->getValue() == (new String($anotherString))->toLowerCase()->getValue();
    }

    /**
     * Returns the length of the sequence of characters represented by this object.
     * @return int
     */
    public function length()
    {
        return mb_strlen($this->value);
    }

    /**
     * Concatenates the specified string to the end of this string.
     * If the length of the argument string is 0, then this String object is returned.
     * Otherwise, a new String object is created, representing a character sequence that
     * is the concatenation of the character sequence represented by this String object and
     * the character sequence represented by the argument string.
     * returns:
     * A string that represents the concatenation of this object's characters followed by the
     * string argument's characters.
     *
     * @param string $str
     * @return String
     */
    public function concat($str)
    {
        if (mb_strlen($str) == 0) {
            return $this;
        }
        return new String($this->value . $str);
    }

    /**
     * Returns true if and only if this string contains the specified sequence of char values.
     * false otherwise
     *
     * @param string $str
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function contains($str)
    {
        if (!$str) {
            throw new \InvalidArgumentException('Argument is null instead string!');
        }
        return (bool)mb_strpos($this->value, $str);
    }

    /**
     * @param string $suffix
     * @return bool
     */
    public function endsWith($suffix)
    {
        /*
        $strlen = strlen($string);
        $testlen = strlen($test);
        if ($testlen > $strlen) return false;
        return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
         */
        // TODO: Implement endsWith method.
    }

    /**
     * @param String $prefix
     * @param int $toffset
     * @return bool
     */
    public function startsWith(String $prefix, $toffset)
    {
        // TODO: Implement startsWith method.
    }

    /**
     * @param int $index
     * @return String
     */
    public function charAt($index)
    {
        // TODO: Implement charAt method.
    }

    /**
     * @param String $char
     * @param int $fromIndex
     * @return int
     */
    public function indexOf(String $char, $fromIndex)
    {
        // TODO: Implement indexOf method.
    }

    /**
     * @param String $ch
     * @param int $fromIndex
     * @return int
     */
    public function lastIndexOf(String $ch, $fromIndex)
    {
        // TODO: Implement lastIndexOf method.
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        // TODO: Implement isEmpty method.
    }

    /**
     * @param String $char
     * @return array
     */
    public function split(String $char)
    {
        // TODO: Implement split method.
    }

    /**
     * @return String
     */
    public function toLowerCase()
    {
        // TODO: Implement toLowerCase method.
    }

    /**
     * @return String
     */
    public function toUpperCase()
    {
        // TODO: Implement toUpperCase method.
    }

    /**
     * @return String
     */
    public function trim()
    {
        // TODO: Implement trim method.
    }

    /**
     * @param int $beginIndex
     * @param int $endIndex
     * @return String
     */
    public function substring($beginIndex, $endIndex)
    {
        // TODO: Implement substring method.
    }

    /**
     * @param String $oldChar
     * @param String $newChar
     * @return String
     */
    public function replace(String $oldChar, String $newChar)
    {
        // TODO: Implement replace method.
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

}
