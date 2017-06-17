# Bitcraft-Core Contributing Guide

Hi! I’m really excited that you are interested in contributing to Bitcraft-Core. Before submitting your contribution though, please make sure to take a moment and read through the following guidelines.

- [Issue Reporting Guidelines](#issue-reporting-guidelines)
- [Pull Request Guidelines](#pull-request-guidelines)
- [Development Setup](#development-setup)

## Issue Reporting Guidelines

- Always use [http://github.com/joshuanasiatka/Bitcraft-Core/issues/](http://github.com/joshuanasiatka/Bitcraft-Core/issues/) to create new issues.

## Pull Request Guidelines

- The `master` branch is basically just a snapshot of the latest stable release. All development should be done in dedicated branches. **Do not submit PRs against the `master` branch.**

- Checkout a topic branch from the relevant branch, e.g. `dev`, and merge back against that branch.

- It's OK to have multiple small commits as you work on the PR - we will let GitHub automatically squash it before merging.

- If adding new feature:
  - Add accompanying test case.
  - Provide convincing reason to add this feature. Ideally you should open a suggestion issue first and have it greenlighted before working on it.


- If fixing a bug:
  - If you are resolving a special issue, add `(fix #xxxx[,#xxx])` (#xxxx is the issue id) in your PR title for a better release log, e.g. `update entities encoding/decoding (fix #3899)`.
  - Provide detailed description of the bug in the PR. Live demo preferred.
  - Add appropriate test coverage if applicable.

## Development Setup

You will need [Composer](https://getcomposer.org/download/) **version 6+**, [Vagrant](https://www.vagrantup.com/downloads.html) to get started with development, and [Nodejs](https://nodejs.org/en/download/) to get started

After cloning the repo, run:

``` bash
$ npm install
```

And...
``` bash
$ composer install
```

## Code Style

We use a different variant of Stroustrup's style in order to create clean and readable code.

Defining Variables, Loops, and Arrays:
``` php
// Line up declarations at the top
$variable = 'Correct';
$array    = [
    'array_value_one',
    'array_value_two'
];
$variableCamelCase = 'Correct';

// Avoid C style for loops
foreach ($array as $arr) {
    echo $arr;
}
```

Creating Classes and Methods:
``` php
// Use namespaces to define scope
use namespace;

// Separate methods with extra spaces for readability
class MyAwesomeClass {

    function __construct () {

    }

    /**
     * [Document methods as such]
     * @param  {[type]} $param1 [description]
     * @param  {[type]} $param2 [description]
     * @return {[type]}         [description]
     */
    function static my_class_method ($param1, $param2) {
        return $param1 + $param2;
    }

}
```
Using Methods:
``` php
MyAwesomeClass::my_class_method( 1, 2 );
```
