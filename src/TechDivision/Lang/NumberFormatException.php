<?php

/**
 * \TechDivision\Lang\NumberFormatException
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
 * Thrown to indicate that the application has attempted to convert
 * a string to one of the numeric types, but that the string does not
 * have the appropriate format.
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */
class NumberFormatException extends Exception
{

    /**
     * Factory method for making a <code>NumberFormatException</code>
     * given the specified input which caused the error.
     *
     * @param string $message The input causing the error
     * 
     * @return void
     * @throws \TechDivision\Lang\NumberFormatException The number format exception itself
     */
    public static function forInputString($message)
    {
        throw new NumberFormatException('For input string: "' . $message . '"');
    }
}
