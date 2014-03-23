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
 * a float value as object.
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */
class Float extends Number
{

    /**
     * The value of the Float.
     * 
     * @var float
     */
    protected $value = null;

    /**
     * Constructs a newly allocated <code>Float</code> object that
     * represents the primitive <code>float</code> argument.
     *
     * @param float $value The value to be represented by the <code>Float</code>
     */
    public function __construct($value)
    {
        if (!isFloat($value)) {
            NumberFormatException::forInputString($value);
        }
        $this->value = $value;
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
     * Returns a <code>Float</code> object holding the
     * <code>float</code> value represented by the argument string
     * <code>s</code>.
     * <p>
     * If <code>s</code> is <code>null</code>, then a
     * <code>NullPointerException</code> is thrown.
     * <p>
     * Leading and trailing whitespace characters in <code>s</code>
     * are ignored. The rest of <code>s</code> should constitute a
     * <i>Float</i> as described by the lexical syntax rules:
     * <blockquote><i>
     * <dl>
     * <dt>Float:
     * <dd><i>Sign<sub>opt</sub></i> <code>NaN</code>
     * <dd><i>Sign<sub>opt</sub></i> <code>Infinity</code>
     * <dd>Sign<sub>opt</sub> FloatingPointLiteral
     * </dl>
     * </i></blockquote>
     * where <i>Sign</i> and <i>FloatingPointLiteral</i> are as
     * defined in <a href="http://java.sun.com/docs/books/jls/second_edition/
     * html/lexical.doc.html#230798">&sect;3.10.2</a>
     * of the <a href="http://java.sun.com/docs/books/jls/html/">Java
     * Language Specification</a>. If <code>s</code> does not have the
     * form of a <i>Float</i>, then a
     * <code>NumberFormatException</code> is thrown. Otherwise,
     * <code>s</code> is regarded as representing an exact decimal
     * value in the usual "computerized scientific notation"; this
     * exact decimal value is then conceptually converted to an
     * "infinitely precise" binary value that is then rounded to type
     * <code>float</code> by the usual round-to-nearest rule of IEEE
     * 754 floating-point arithmetic, which includes preserving the
     * sign of a zero value. Finally, a <code>Float</code> object
     * representing this <code>float</code> value is returned.
     * <p>
     * To interpret localized string representations of a
     * floating-point value, use subclasses of {@link
     * java.text.NumberFormat}.
     *
     * <p>Note that trailing format specifiers, specifiers that
     * determine the type of a floating-point literal
     * (<code>1.0f</code> is a <code>float</code> value;
     * <code>1.0d</code> is a <code>double</code> value), do
     * <em>not</em> influence the results of this method. In other
     * words, the numerical value of the input string is converted
     * directly to the target floating-point type. In general, the
     * two-step sequence of conversions, string to <code>double</code>
     * followed by <code>double</code> to <code>float</code>, is
     * <em>not</em> equivalent to converting a string directly to
     * <code>float</code>. For example, if first converted to an
     * intermediate <code>double</code> and then to
     * <code>float</code>, the string<br>
     * <code>"1.00000017881393421514957253748434595763683319091796875001d"
     * </code><br>results in the <code>float</code> value
     * <code>1.0000002f</code>; if the string is converted directly to
     * <code>float</code>, <code>1.000000<b>1</b>f</code> results.
     *
     * @param \TechDivision\Lang\String $string The string to be parsed
     * 
     * @return \TechDivision\Lang\Float A <code>Float</code> object holding the value represented by the <code>String</code> argument        
     * @exception \TechDivision\Lang\NumberFormatException If the string does not contain a parsable number
     */
    public static function valueOf(String $string)
    {
        if (! preg_match("/([0-9\.-]+)/", $string->stringValue())) {
            NumberFormatException::forInputString($string->stringValue());
        }
        if (! is_numeric($string->stringValue())) {
            NumberFormatException::forInputString($string->stringValue());
        }
        return new Float((float) $string->stringValue());
    }

    /**
     * Returns a new <code>float</code> initialized to the value
     * represented by the specified <code>String</code>, as performed
     * by the <code>valueOf</code> method of class <code>Float</code>.
     *
     * @param \TechDivision\Lang\String $string She string to be parsed
     * 
     * @return float The <code>float</code> value represented by the string argument
     * @exception \TechDivision\Lang\NumberFormatException If the string does not contain a parsable <code>float</code>.
     * @see \TechDivision\Lang\Float::valueOf($string)
     */
    public static function parseFloat(String $string)
    {
        return Float::valueOf($string)->floatValue();
    }

    /**
     *
     * @see \TechDivision\Lang\Number::floatValue()
     */
    public function floatValue()
    {
        return $this->value;
    }

    /**
     *
     * @see \TechDivision\Lang\Number::intValue()
     */
    public function intValue()
    {
        return (int) $this->value;
    }

    /**
     *
     * @see \TechDivision\Lang\Number::doubleValue()
     */
    public function doubleValue()
    {
        return (double) $this->value;
    }

    /**
     * This object as String returned.
     *
     * @return \TechDivision\Lang\String The value as String.
     */
    public function toString()
    {
        return new String($this->value);
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \TechDivision\Lang\Object::__toString()
     */
    public function __toString()
    {
        $string = new String($this->value);
        return $string->stringValue();
    }

    /**
     * Returns true if the passed value is equal.
     *
     * @param \TechDivision\Lang\Object $val The value to check
     * 
     * @return boolean
     */
    public function equals(Object $val)
    {
        if ($val instanceof Float) {
            return $this->floatValue() == $val->floatValue();
        }
        return false;
    }

    /**
     * Adds the value of the passed Float.
     *
     * @param \TechDivision\Lang\Float $toAdd The Float to add
     * 
     * @return \TechDivision\Lang\Float The instance
     */
    public function add(Float $toAdd)
    {
        $this->value += $toAdd->floatValue();
        return $this;
    }

    /**
     * Subtracts the value of the passed Float.
     *
     * @param \TechDivision\Lang\Float $toSubtract The Float to subtract
     * 
     * @return \TechDivision\Lang\Float The instance
     */
    public function subtract(Float $toSubtract)
    {
        $this->value -= $toSubtract->floatValue();
        return $this;
    }

    /**
     * Multiplies the Float with the passed one.
     *
     * @param \TechDivision\Lang\Float $toMultiply The Float to multiply
     * 
     * @return \TechDivision\Lang\Float The instance
     */
    public function multiply(Float $toMultiply)
    {
        $this->value *= $toMultiply->intValue();
        return $this;
    }

    /**
     * Divides the Float by the passed one.
     *
     * @param \TechDivision\Lang\Float $dividyBy The Float to dividy by
     * 
     * @return \TechDivision\Lang\Float The instance
     */
    public function divide(Float $dividyBy)
    {
        $this->value = $this->value / $dividyBy->floatValue();
        return $this;
    }
}
