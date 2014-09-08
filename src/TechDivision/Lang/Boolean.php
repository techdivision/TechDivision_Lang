<?php

/**
 * \TechDivision\Lang\Boolean
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */

namespace TechDivision\Lang;

/**
 * This class implements functionality to handle
 * a boolean value as object.
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */
class Boolean extends Object
{

    /**
     * The value of the Boolean.
     *
     * @var boolean
     */
    protected $value = false;

    /**
     * The accepted values for a Boolean object.
     *
     * @var array
     */
    protected $booleans = array(
        true,
        false,
        1,
        0,
        "1",
        "0",
        "true",
        "false",
        "on",
        "off",
        "yes",
        "no",
        "y",
        "n"
    );

    /**
     * The boolean representation of
     * the requested value.
     *
     * @var array
     */
    protected $values = array(
        true => true,
        false => false,
        1 => true,
        0 => false,
        "1" => true,
        "0" => false,
        "true" => true,
        "false" => false,
        "on" => true,
        "off" => false,
        "yes" => true,
        "no" => false,
        "y" => true,
        "n" => false
    );

    /**
     * Constructs a newly allocated Boolean object that
     * represents the primitive boolean argument.
     *
     * @param boolean $value The value to be represented by the Boolean.
     *
     * @return void
     * @throws \TechDivision\Lang\ClassCastException The passed value is not a valid boolean representation
     */
    public function __construct($value)
    {
        if (in_array($value, $this->booleans, true)) {
            $this->value = $this->values[$value];
        } else {
            throw new ClassCastException('The passed value ' . $value . ' is not a valid Boolean');
        }
    }

    /**
     * This method returns the class name as
     * a string.
     *
     * @return string
     */
    public static function __getClass()
    {
        return __CLASS__;
    }

    /**
     * Returns the value of this Boolean object as a
     * boolean primitive.
     *
     * @return boolean Holds the value as a boolean primitive
     */
    public function booleanValue()
    {
        return $this->value;
    }

    /**
     * Returns a Boolean with a value represented by the specified String.
     *
     * If the passed string has the primitive value TRUE or 1 then the
     * returned object is initialized with the primitive value TRUE else
     * with FALSE.
     *
     * @param \TechDivision\Lang\String $string Holds the String object to get the Boolean representation for
     *
     * @return \TechDivision\Lang\Boolean The Boolean object representing the specified String.
     */
    public static function valueOf(String $string)
    {
        // if the passed value is "true" or "1" then return a new Boolean
        // object initialized with true
        if ($string->equals(new String("1")) ||
            $string->equals(new String("true")) ||
            $string->equals(new String("yes")) ||
            $string->equals(new String("on")) ||
            $string->equals(new String("y"))) {
            return new Boolean(true);
        }
        // else return a new Boolean object initialized with false
        return new Boolean(false);
    }

    /**
     * This method checks if the passed object is equal
     * to itself.
     *
     * @param \TechDivision\Lang\Object $obj The object to check
     *
     * @return boolean Returns TRUE if the passed object is equal
     * @see \TechDivision\Lang\Object::equals()
     */
    public function equals(Object $obj)
    {
        return $this->booleanValue() == $obj->booleanValue();
    }

    /**
     * This object as String returned.
     *
     * @return \TechDivision\Lang\String The value as String.
     */
    public function toString()
    {
        return new String($this->__toString());
    }

    /**
     * This method returns the class as
     * a string representation.
     *
     * @return string The objects string representation
     * @see \TechDivision\Lang\Object::__toString()
     */
    public function __toString()
    {
        // if TRUE, return string 'true'
        if ($this->value) {
            return 'true';
        }
        // else return string 'false'
        return 'false';
    }

    /**
     * This method has to be called to serialize the Boolean.
     *
     * @return string Returns a serialized version of the Boolean
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize($this->value);
    }

    /**
     * This method unserializes the passed string and initializes the Boolean
     * itself with the data.
     *
     * @param string $data Holds the data of the instance as serialized string
     *
     * @return void
     * @see \Serializable::unserialize($data)
     */
    public function unserialize($data)
    {
        $this->value = unserialize($data);
    }
}
