<?php

/**
 * TechDivision\Lang\Reflection\ClassInterface
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
 * A reflection class interface.
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */
interface ClassInterface
{

    /**
     * Returns the class name.
     *
     * @return string The class name
     */
    public function getName();

    /**
     * Returns the short class name (without namespace).
     *
     * @return string The short class name
     */
    public function getShortName();

    /**
     * Returns an array with annotation names we want to ignore when loaded.
     *
     * @return array The annotation names we want to ignore
     */
    public function getAnnotationsToIgnore();

    /**
     * Returns an array with annotation aliases used when create annotation instances.
     *
     * @return array The annotation aliases used when create annotation instances
     */
    public function getAnnotationAliases();

    /**
     * Returns the class annotations.
     *
     * @return array The class annotations
     */
    public function getAnnotations();

    /**
     * Queries whether the reflection class has an annotation with the passed name or not.
     *
     * @param string $annotationName The annotation we want to query
     *
     * @return boolean TRUE if the reflection class has the annotation, else FALSE
     */
    public function hasAnnotation($annotationName);

    /**
     * Returns the annotation instance with the passed name.
     *
     * @param string $annotationName The name of the requested annotation instance
     *
     * @return \TechDivision\Lang\Reflection\AnnotationInterface|null The requested annotation instance
     */
    public function getAnnotation($annotationName);

    /**
     * Returns the class methods.
     *
     * @param integer $filter Filter the results to include only methods with certain attributes
     *
     * @return array The class methods
     * @link http://php.net/manual/en/reflectionclass.getmethods.php
     */
    public function getMethods($filter = 0);

    /**
     * Queries whether the reflection class has an method with the passed name or not.
     *
     * @param string $name The method we want to query
     *
     * @return boolean TRUE if the reflection class has the method, else FALSE
     */
    public function hasMethod($name);

    /**
     * Returns the requested reflection method.
     *
     * @param string $name The name of the reflection method to return
     *
     * @return \TechDivision\Lang\Reflection\ReflectionMethod The requested reflection method
     * @throws \TechDivision\Lang\Reflection\ReflectionException Is thrown if the requested method is not available
     * @link http://php.net/manual/en/reflectionclass.getmethod.php
     */
    public function getMethod($name);

    /**
     * Returns the class properties.
     *
     * @param integer $filter Filter the results to include only properties with certain attributes
     *
     * @return array The class properties
     * @link http://php.net/manual/en/reflectionclass.getproperties.php
     */
    public function getProperties($filter = 0);

    /**
     * Queries whether the reflection class has an property with the passed name or not.
     *
     * @param string $name The property we want to query
     *
     * @return boolean TRUE if the reflection class has the property, else FALSE
     */
    public function hasProperty($name);

    /**
     * Returns the requested reflection property.
     *
     * @param string $name The name of the reflection property to return
     *
     * @return \TechDivision\Lang\Reflection\ReflectionProperty The requested reflection property
     * @throws \TechDivision\Lang\Reflection\ReflectionException Is thrown if the requested property is not available
     * @link http://php.net/manual/en/reflectionclass.getproperty.php
     */
    public function getProperty($name);

    /**
     * Returns a new annotation instance.
     *
     * You can pass a random number of arguments to this function. These
     * arguments will be passed to the constructor of the new instance.
     *
     * @return object A new annotation instance initialized with the passed arguments
     * @link http://php.net/manual/en/reflectionclass.newinstance.php
     */
    public function newInstance();

    /**
     * Returns a new annotation instance.
     *
     * @param array $args The arguments that will be passed to the instance constructor
     *
     * @return object A new annotation instance initialized with the passed arguments
     * @link http://php.net/manual/en/reflectionclass.newinstanceargs.php
     */
    public function newInstanceArgs(array $args = array());

    /**
     * Returns a PHP reflection class representation of this instance.
     *
     * @return \ReflectionClass The PHP reflection class instance
     */
    public function toPhpReflectionClass();
}
