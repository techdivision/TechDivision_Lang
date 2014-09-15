<?php

/**
 * TechDivision\Lang\Reflection\ReflectionClass
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
 * A wrapper instance for a reflection class.
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */
class ReflectionClass extends Object implements ClassInterface, \Serializable
{

    /**
     * The class name to invoke the method on.
     *
     * @var string
     */
    protected $name = '';

    /**
     * Array with annotations names we want to ignore when loaded.
     *
     * @var array
     */
    protected $annotationsToIgnore = array();

    /**
     * Array with annotation aliases used when create annotation instances.
     *
     * @var array
     */
    protected $annotationAliases = array();

    /**
     * Initializes the timed object with the passed data.
     *
     * @param string $name                The class name to invoke the method on
     * @param array  $annotationsToIgnore An array with annotations names we want to ignore when loaded
     * @param array  $annotationAliases   An array with annotation aliases used when create annotation instances
     */
    public function __construct($name, array $annotationsToIgnore = array(), array $annotationAliases = array())
    {
        $this->name = $name;
        $this->annotationsToIgnore = $annotationsToIgnore;
        $this->annotationAliases = $annotationAliases;
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
     * Returns the class name.
     *
     * @return string The class name
     * @see \TechDivision\Lang\Reflection\ClassInterface::getClassName()
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns an array with annotation names we want to ignore when loaded.
     *
     * @return array The annotation names we want to ignore
     * @see \TechDivision\Lang\Reflection\ClassInterface::getAnnotationsToIgnore()
     */
    public function getAnnotationsToIgnore()
    {
        return $this->annotationsToIgnore;
    }

    /**
     * Returns an array with annotation aliases used when create annotation instances.
     *
     * @return array The annotation aliases used when create annotation instances
     * @see \TechDivision\Lang\Reflection\ClassInterface::getAnnotationAliases()
     */
    public function getAnnotationAliases()
    {
        return $this->annotationAliases;
    }

    /**
     * Returns the class annotations.
     *
     * @return array The class annotations
     * @see \TechDivision\Lang\Reflection\ClassInterface::getAnnotations()
     */
    public function getAnnotations()
    {
        return ReflectionAnnotation::fromReflectionClass($this);
    }

    /**
     * Queries whether the reflection class has an annotation with the passed name or not.
     *
     * @param string $annotationName The annotation we want to query
     *
     * @return boolean TRUE if the reflection class has the annotation, else FALSE
     * @see \TechDivision\Lang\Reflection\ClassInterface::hasAnnotation()
     */
    public function hasAnnotation($annotationName)
    {
        return array_key_exists($annotationName, $this->getAnnotations());
    }

    /**
     * Returns the annotation instance with the passed name.
     *
     * @param string $annotationName The name of the requested annotation instance
     *
     * @return \TechDivision\Lang\Reflection\AnnotationInterface|null The requested annotation instance
     * @throws \TechDivision\Lang\Reflection\ReflectionException Is thrown if the requested annotation is not available
     * @see \TechDivision\Lang\Reflection\ClassInterface::getAnnotation()
     */
    public function getAnnotation($annotationName)
    {

        // first check if the method is available
        if (array_key_exists($annotationName, $annotations = $this->getAnnotations())) { // if yes, return it
            return $annotations[$annotationName];
        }

        // if not, throw an exception
        throw new ReflectionException(sprintf('The requested reflection annotation %s is not available', $annotationName));
    }

    /**
     * Returns the class methods.
     *
     * @param integer $filter Filter the results to include only methods with certain attributes
     *
     * @return array The class methods
     * @see \TechDivision\Lang\Reflection\ClassInterface::getMethods()
     * @link http://php.net/manual/en/reflectionclass.getmethods.php
     */
    public function getMethods($filter = 0)
    {
        return ReflectionMethod::fromReflectionClass($this, $filter, $this->getAnnotationsToIgnore(), $this->getAnnotationAliases());
    }

    /**
     * Queries whether the reflection class has an method with the passed name or not.
     *
     * @param string $name The method we want to query
     *
     * @return boolean TRUE if the reflection class has the method, else FALSE
     * @see \TechDivision\Lang\Reflection\ClassInterface::hasMethod()
     */
    public function hasMethod($name)
    {
        return array_key_exists($name, $this->getMethods());
    }

    /**
     * Returns the requested reflection method.
     *
     * @param string $name The name of the reflection method to return
     *
     * @return \TechDivision\Lang\Reflection\ReflectionMethod The requested reflection method
     * @throws \TechDivision\Lang\Reflection\ReflectionException Is thrown if the requested method is not available
     * @see \TechDivision\Lang\Reflection\ClassInterface::getMethod()
     * @link http://php.net/manual/en/reflectionclass.getmethod.php
     */
    public function getMethod($name)
    {

        // first check if the method is available
        if (array_key_exists($name, $methods = $this->getMethods())) { // if yes, return it
            return $methods[$name];
        }

        // if not, throw an exception
        throw new ReflectionException(sprintf('The requested reflection method %s is not available', $name));
    }

    /**
     * Returns a new annotation instance.
     *
     * You can pass a random number of arguments to this function. These
     * arguments will be passed to the constructor of the new instance.
     *
     * @return object A new annotation instance initialized with the passed arguments
     * @see \TechDivision\Lang\Reflection\ClassInterface::newInstance()
     */
    public function newInstance()
    {
        return $this->newInstanceArgs(func_get_args());
    }

    /**
     * Returns a new annotation instance.
     *
     * @param array $args The arguments that will be passed to the instance constructor
     *
     * @return object A new annotation instance initialized with the passed arguments
     * @see \TechDivision\Lang\Reflection\ClassInterface::newInstanceArgs()
     */
    public function newInstanceArgs(array $args = array())
    {
        // create a reflection instance of the found annotation name
        $reflectionClass = $this->toPhpReflectionClass();

        // create a new instance passing the found arguements to the constructor
        return $reflectionClass->newInstanceArgs($args);
    }

    /**
     * Serializes the timeout method and returns a string representation.
     *
     * @return string The serialized string representation of the instance
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(get_object_vars($this));
    }

    /**
     * Restores the instance with the serialized data of the passed string.
     *
     * @param string $data The serialized method representation
     *
     * @return void
     * @see \Serializable::unserialize()
     */
    public function unserialize($data)
    {
        foreach (unserialize($data) as $propertyName => $propertyValue) {
            $this->$propertyName = $propertyValue;
        }
    }

    /**
     * Checks whether it implements the passed interface or not.
     *
     * @param string $interface The interface name
     *
     * @return boolean Returns TRUE on success or FALSE on failure
     * @link php.net/manual/en/reflectionclass.implementsinterface.php
     */
    public function implementsInterface($interface)
    {
        return $this->toPhpReflectionClass()->implementsInterface($interface);
    }

    /**
     * Returns a PHP reflection class representation of this instance.
     *
     * @return \ReflectionClass The PHP reflection class instance
     * @see \TechDivision\Lang\Reflection\ClassInterface::toPhpReflectionClass()
     */
    public function toPhpReflectionClass()
    {
        return new \ReflectionClass($this->getName());
    }

    /**
     * Creates a new reflection class instance from the passed PHP reflection class.
     *
     * @param \ReflectionClass $reflectionClass     The PHP reflection class to load the data from
     * @param array            $annotationsToIgnore An array with annotations names we want to ignore when loaded
     * @param array            $annotationAliases   An array with annotation aliases used when create annotation instances
     *
     * @return \TechDivision\Lang\Reflection\ReflectionClass The instance
     */
    public static function fromPhpReflectionClass(\ReflectionClass $reflectionClass, array $annotationsToIgnore = array(), array $annotationAliases = array())
    {
        return new ReflectionClass($reflectionClass->getName(), $annotationsToIgnore, $annotationAliases);
    }
}
