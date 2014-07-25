# TechDivision_Lang

[![Latest Stable Version](https://poser.pugx.org/techdivision/lang/v/stable.png)](https://packagist.org/packages/techdivision/lang) [![Total Downloads](https://poser.pugx.org/techdivision/lang/downloads.png)](https://packagist.org/packages/techdivision/lang) [![Latest Unstable Version](https://poser.pugx.org/techdivision/lang/v/unstable.png)](https://packagist.org/packages/techdivision/lang) [![License](https://poser.pugx.org/techdivision/lang/license.png)](https://packagist.org/packages/techdivision/lang) [![Build Status](https://travis-ci.org/techdivision/TechDivision_Lang.png)](https://travis-ci.org/techdivision/TechDivision_Lang)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/techdivision/TechDivision_Lang/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/techdivision/TechDivision_Lang/?branch=master)[![Code Coverage](https://scrutinizer-ci.com/g/techdivision/TechDivision_Lang/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/techdivision/TechDivision_Lang/?branch=master)

## Introduction

This package provides implementation of basic PHP datatypes.

## Installation

If you want to use the library with your application you can install it by adding

```sh
{
    "require": {
        "techdivision/lang": "dev-master"
    },
}
```

to your `composer.json` and invoke `composer update` in your project.

## Usage

This package provides classes representing an object oriented implementation for some basic datatypes. 

As there has been (and still are) many discussions about PHP and type safety i decided to implement a small, really
basic library that will offer the most basic datatype needed in nearly every project. To be honest, i really like
almost allof those nice possibilities languages like Java provides, but as PHP is not Java, you always have to find a
neat way for implementing similar things in a way it makes sense in a PHP environment.

The intention for implementing that classes was the possiblity to make your critical functions and methods type safe,
by using them for type hints on the one hand and the possiblity to have an quick and easy to use kind of data
validation mechanism on the other.

As you may know, using type hints will probably slow down your code a bit, so take care when you use them and
always have an eye on possible performance impacts by running performance tests regularily.

The data type implementations this library will provide, are

* Object
* Boolean
* Integer
* Float
* String

The following examples wil give you a short introduction about the functionality each class will provide and
how you can use it in your code. Please be aware, that the examples are not intended to make any sense, they
should only give you an idea what is possible.

### Object

The abstract class `Object` implements a low level presentation of a class. All other classes of this library use it
as superclass.

### Boolean

Using a `Boolean` instance to compare against anonther one or try to instanciate it with a not boolean value.

```php
// initialize a new Integer instance
$bool = new Boolean(true);
$bool->equals(new Boolean(false)); // false

// throws a ClassCastException
$invalid = new Boolean('aValue');
```

### Integer

Here are some examples how you can use the `Integer` class

```php
// initialize a new Integer instance
$int = new Integer(17);
	    
// get the float value of the Integer
echo $int->floatValue() . PHP_EOL; // 17.0
echo $int->stringValue() . PHP_EOL; // '17'

// check that the two Integer instances are equal
$int->equals(Integer::valueOf(new String('17'))); // true
```

### Float

Still to come!

### String

Still to come!

# External Links

* Documentation at [appserver.io](http://docs.appserver.io)
* Documentation on [GitHub](https://github.com/techdivision/TechDivision_AppserverDocumentation)
* [Getting started](https://github.com/techdivision/TechDivision_AppserverDocumentation/tree/master/docs/getting-started)
