<?php

/**
 * TechDivision\Lang\Reflection\AnnotationInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */

namespace TechDivision\Lang\Reflection;

/**
 * A reflection annotation interface.
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */
interface AnnotationInterface
{

    /**
     * Returns the annation name.
     *
     * @return string The annotation name
     */
    public function getAnnotationName();

    /**
     * Queries whether this annotation instance has a value with the passed key or not.
     *
     * @param string $key The key we want to query
     *
     * @return boolean TRUE if the value is available, else FALSE
     */
    public function hasValue($key);

    /**
     * Returns the value for the passed key, if available.
     *
     * @param string $key The key of the value to return
     *
     * @return mixed|null The requested value
     */
    public function getValue($key);

    /**
     * Sets the value with the passed key, existing values
     * are overwritten.
     *
     * @param string $key   The key of the value
     * @param string $value The value to set
     *
     * @return void
     */
    public function setValue($key, $value);
}
