<?php

/**
 * TechDivision\Lang\Reflection\MockAnnotation
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

use TechDivision\Lang\Object;

/**
 * A mock annotation implementation.
 *
 * @category Library
 * @package TechDivision_Lang
 * @subpackage Reflection
 * @author Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link https://github.com/techdivision/TechDivision_Lang
 */
class MockAnnotation extends Object
{

    /**
     * Initializes the mock instance with dummy args.
     *
     * @param array $values The args to pass to the instance
     */
    public function __construct(array $values = array())
    {
        $this->values = $values;
    }

    /**
     * Returns the requested value if available.
     *
     * @param string $key The key of the value to return
     *
     * @return mixed The requested value
     */
    public function getValue($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
    }
}
