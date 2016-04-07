<?php
/**
 * Created by PHP 5.6 generator
 * User: Victor Ribeiro <victormech@gmail.com>
 * PHP 5.6 generator created by Victor MECH - April 2016
*/

namespace LazyEight\BasicTypes;


use LazyEight\BasicTypes\Exceptions\IndexOutOfBoundsException;
use LazyEight\BasicTypes\Interfaces\ValueObjectInterface;

class Stringy implements ValueObjectInterface
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
     * argument is not null and is a Stringy object that represents the same sequence of
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
     * Compares this Stringy to another Stringy, ignoring case considerations.
     * Two strings are considered equal ignoring case if they are of the same length
     * and corresponding characters in the two strings are equal ignoring case.
     *
     * Two characters c1 and c2 are considered the same ignoring case if at least one of the
     * following is true:
     * The two characters are the same (as compared by the == operator)
     * Applying the method Stringy.toUpperCase(char) to each character produces the same result
     * Applying the method Stringy.toLowerCase(char) to each character produces the same result
     * Returns:
     * true if the argument is not null and it represents an equivalent Stringy ignoring case;
     * false otherwise
     *
     * @param string $anotherString
     * @return bool
     */
    public function equalsIgnoreCase($anotherString)
    {
        return $this->toLowerCase()->getValue() == (new Stringy($anotherString))->toLowerCase()->getValue();
    }

    /**
     * Returns the length of the sequence of characters represented by this object.
     *
     * @return int
     */
    public function length()
    {
        return mb_strlen($this->value);
    }

    /**
     * Concatenates the specified string to the end of this string.
     * If the length of the argument string is 0, then this Stringy object is returned.
     * Otherwise, a new Stringy object is created, representing a character sequence that
     * is the concatenation of the character sequence represented by this Stringy object and
     * the character sequence represented by the argument string.
     * returns:
     * A string that represents the concatenation of this object's characters followed by the
     * string argument's characters.
     *
     * @param string $str
     * @return Stringy
     */
    public function concat($str)
    {
        if (mb_strlen($str) == 0) {
            return $this;
        }
        return new Stringy($this->value . $str);
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
        if (is_null($str)) {
            throw new \InvalidArgumentException('Argument is null instead of string!');
        }
        return (bool)mb_strpos($this->value, $str);
    }

    /**
     * Returns true if the string ends with $substring, false otherwise. By
     * default, the comparison is case-sensitive, but can be made insensitive
     * by setting $caseSensitive to false.
     *
     * @param string $suffix
     * @param bool $caseSensitive
     * @return bool
     */
    public function endsWith($suffix, $caseSensitive = true)
    {
        $substringLength = mb_strlen($suffix);
        $strLength = $this->length();
        $endOfStr = mb_substr($this->value, $strLength - $substringLength, $substringLength);
        $substring = $suffix;

        if (!$caseSensitive) {
            $substring = mb_strtolower($suffix);
            $endOfStr = mb_strtolower($endOfStr);
        }
        return $substring == $endOfStr;
    }

    /**
     * Tests if the substring of this string beginning at the specified index starts
     * with the specified prefix.
     * Returns:
     * true if the character sequence represented by the argument is a prefix of the substring of
     * this object starting at index toOffset; false otherwise. The result is false if toOffset
     * is negative or greater than the length of this Stringy Object
     *
     * @param string $prefix
     * @param int $toOffset
     * @return bool
     */
    public function startsWith($prefix, $toOffset = 0)
    {
        $strToSearch = mb_substr($this->value, $toOffset, mb_strlen($prefix));
        if (false !== mb_strpos($strToSearch, $prefix)) {
            return true;
        }
        return false;
    }

    /**
     * Returns the char value at the specified index. An index ranges from 0 to length() - 1.
     * The first char value of the sequence is at index 0, the next at index 1, and so on,
     * as for array indexing. If the char value specified by the index is a surrogate,
     * the surrogate value is returned.
     *
     * @param int $index
     * @throws IndexOutOfBoundsException
     * @return String
     */
    public function charAt($index)
    {
        if ((int) $index < 0 || (int) $index > $this->length()) {
            throw new IndexOutOfBoundsException('The index argument is negative or not less than the length of this string.');
        }
        return new Stringy(mb_substr($this->value, (int) $index, 1));
    }

    /**
     * Returns the index within this string of the first occurrence of the specified character.
     * If the argument fromIndex is specified the search will start at the index that was informed
     *
     * @param string $char
     * @param int $fromIndex
     * @return int positive with the position of desired part of the string, -1 if the string not found
     */
    public function indexOf($char, $fromIndex = 0)
    {
        $position = mb_strpos($this->value, $char, (int) $fromIndex);
        if (false === $position) {
            return -1;
        }
        return $position;
    }

    /**
     * Returns the index within this string of the last occurrence of the specified character.
     * If you set the fromIndex argument the method will searching backward starting at the specified index.
     *
     * @param string $char
     * @param int $fromIndex
     * @return int
     */
    public function lastIndexOf($char, $fromIndex = 0)
    {
        $position = mb_strripos($this->value, $char, (int) $fromIndex);
        if (false === $position) {
            return -1;
        }
        return $position;
    }

    /**
     * Returns true if, and only if, length() is 0.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return 0 === $this->length();
    }

    /**
     * Splits this string around matches of the given regular expression.
     *
     * @param string $char
     * @return array
     */
    public function split($char)
    {
        return mb_split($char, $this->value);
    }

    /**
     * Converts all of the characters in this Stringy to lower case using the rules
     * of the default locale.
     *
     * @return Stringy
     */
    public function toLowerCase()
    {
        return new Stringy(mb_strtolower($this->value));
    }

    /**
     * Converts all of the characters in this Stringy to upper case using the rules
     * of the default locale.
     *
     * @return Stringy
     */
    public function toUpperCase()
    {
        return new Stringy(mb_strtoupper($this->value));
    }

    /**
     * Returns a copy of the string, with leading and trailing whitespace omitted.
     *
     * @return String
     */
    public function trim()
    {
        return new Stringy(trim($this->value));
    }

    /**
     * Returns a new string that is a substring of this string. The substring begins at
     * the specified beginIndex and extends to the character at index endIndex - 1.
     * Thus the length of the substring is endIndex-beginIndex.
     *
     * @param int $beginIndex
     * @param int $endIndex
     * @return String
     */
    public function substring($beginIndex, $endIndex = -1)
    {
        new Stringy(mb_substr($this->value, $beginIndex, ($endIndex - $beginIndex)));
    }

    /**
     * Returns a new string resulting from replacing all occurrences of
     * oldChar in this string with newChar.
     *
     * @param string $oldChar
     * @param string $newChar
     * @return String
     */
    public function replace($oldChar, $newChar)
    {
        return new Stringy(str_replace($oldChar, $newChar, $this->value));
    }

    /**
     * The string value (which is already a string!) is itself returned.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }
}
