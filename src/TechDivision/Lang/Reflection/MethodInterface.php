<?php

/**
 * TechDivision\Lang\Reflection\MethodInterface
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
 * A reflection method interface.
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */
interface MethodInterface
{

    /**
     * Returns the class name to invoke the method on.
     *
     * @return string The class name
     */
    public function getClassName();

    /**
     * Returns the method name to invoke on the class.
     *
     * @return string The method name
     */
    public function getMethodName();

    /**
     * Returns the method parameters.
     *
     * @return array The method parameters
     */
    public function getParameters();

    /**
     * Returns the method annotations.
     *
     * @return array The method annotations
     */
    public function getAnnotations();
}
