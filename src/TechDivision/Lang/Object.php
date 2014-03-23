<?php

/**
 * \TechDivision\Lang\Object
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
 * This class is the abstract class of all other classes.
 *
 * @category  Library
 * @package   TechDivision_Lang
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Lang
 */
abstract class Object
{

    /**
     * This method returns the class as
     * a string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return get_class($this) . "@" . sha1(serialize($this));
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
     * This method checks if the passed object is equal
     * to itself.
     *
     * @param \TechDivision\Lang\Object $obj The object to check
     * 
     * @return boolean Returns TRUE if the passed object is equal
     */
    public function equals(Object $obj)
    {
        if ($obj === $this) {
            return true;
        }
        return false;
    }
}
