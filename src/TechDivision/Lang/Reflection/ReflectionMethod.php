<?php

/**
 * TechDivision\Lang\Reflection\ReflectionMethod
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
 * A wrapper instance for a reflection method.
 *
 * @category   Library
 * @package    TechDivision_Lang
 * @subpackage Reflection
 * @author     Tim Wagner <tw@techdivision.com>
 * @copyright  2014 TechDivision GmbH <info@techdivision.com>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/techdivision/TechDivision_Lang
 */
class ReflectionMethod extends Object implements MethodInterface, \Serializable
{

    /**
     * The class name to invoke the method on.
     *
     * @var string
     */
    protected $className = '';

    /**
     * The method name to invoke on the class.
     *
     * @var string
     */
    protected $methodName = '';

    /**
     * The method parameters.
     *
     * @var string
     */
    protected $parameters = null;

    /**
     * The method annotations.
     *
     * @var array|null
     */
    protected $annotations = null;

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
     * Initializes the timeout method with the passed data.
     *
     * @param string $className           The class name to invoke the method on
     * @param string $methodName          The method name to invoke on the class
     * @param array  $annotationsToIgnore An array with annotations names we want to ignore when loaded
     * @param array  $annotationAliases   An array with annotation aliases used when create annotation instances
     */
    public function __construct($className, $methodName, array $annotationsToIgnore = array(), array $annotationAliases = array())
    {
        $this->className = $className;
        $this->methodName = $methodName;
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
     * Returns the class name to invoke the method on.
     *
     * @return string The class name
     * @see \TechDivision\Lang\Reflection\MethodInterface::getClassName()
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Returns the method name to invoke on the class.
     *
     * @return string The method name
     * @see \TechDivision\Lang\Reflection\MethodInterface::getMethodName()
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

    /**
     * Returns an array with annotation names we want to ignore when loaded.
     *
     * @return array The annotation names we want to ignore
     * @see \TechDivision\Lang\Reflection\MethodInterface::getAnnotationsToIgnore()
     */
    public function getAnnotationsToIgnore()
    {
        return $this->annotationsToIgnore;
    }

    /**
     * Returns an array with annotation aliases used when create annotation instances.
     *
     * @return array The annotation aliases used when create annotation instances
     * @see \TechDivision\Lang\Reflection\MethodInterface::getAnnotationAliases()
     */
    public function getAnnotationAliases()
    {
        return $this->annotationAliases;
    }

    /**
     * Returns the method parameters.
     *
     * @return array The method parameters
     * @see \TechDivision\Lang\Reflection\MethodInterface::getParameters()
     */
    public function getParameters()
    {
        throw new ReflectionException(__METHOD__ . ' has not been implemented yet');
    }

    /**
     * Returns the method annotations.
     *
     * @return array The method annotations
     * @see \TechDivision\Lang\Reflection\MethodInterface::getAnnotations()
     */
    public function getAnnotations()
    {

        if ($this->annotations = null) { // make sure annotations has been loaded
            $this->annotations = ReflectionAnnotation::fromReflectionMethod($this);
        }

        // return the array with annotations
        return $this->annotations;
    }

    /**
     * Queries whether the reflection method has an annotation with the passed name or not.
     *
     * @param string $annotationName The annotation we want to query
     *
     * @return boolean TRUE if the reflection method has the annotation, else FALSE
     * @see \TechDivision\Lang\Reflection\MethodInterface::hasAnnotation()
     */
    public function hasAnnotation($annotationName)
    {
        array_key_exists($annotationName, $this->getAnnotations());
    }

    /**
     * Returns the annotation instance with the passed name.
     *
     * @param string $annotationName The name of the requested annotation instance
     *
     * @return \TechDivision\Lang\Reflection\AnnotationInterface|null The requested annotation instance
     * @see \TechDivision\Lang\Reflection\MethodInterface::hasAnnotation()
     */
    public function getAnnotation($annotationName)
    {
        if ($this->hasAnnotation($annotationName)) {
            return $this->annotations[$annotationName];
        }
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
     * Returns a PHP reflection method representation of this instance.
     *
     * @return \ReflectionMethod The PHP reflection method instance
     * @see \TechDivision\Lang\Reflection\MethodInterface::toPhpReflectionMethod()
     */
    public function toPhpReflectionMethod()
    {
        return new \ReflectionMethod($this->getClassName(), $this->getMethodName());
    }

    /**
     * Creates a new reflection method instance from the passed PHP reflection method.
     *
     * @param \ReflectionMethod $reflectionMethod    The reflection method to load the data from
     * @param array             $annotationsToIgnore An array with annotations names we want to ignore when loaded
     * @param array             $annotationAliases   An array with annotation aliases used when create annotation instances
     *
     * @return \TechDivision\Lang\Reflection\ReflectionMethod The instance
     */
    public static function fromReflectionMethod(\ReflectionMethod $reflectionMethod, array $annotationsToIgnore = array(), array $annotationAliases = array())
    {

        // load class and method name from the reflection class
        $className = $reflectionMethod->getDeclaringClass()->getName();
        $methodName = $reflectionMethod->getName();

        // initialize and return the timeout method instance
        return new ReflectionMethod($className, $methodName, $annotationsToIgnore, $annotationAliases);
    }
}
