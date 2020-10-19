# Gilded Rose Refactoring Kata

This Kata was originally created by Terry Hughes (http://twitter.com/TerryHughes). It is already on GitHub [here](https://github.com/NotMyself/GildedRose). See also [Bobby Johnson's description of the kata](http://iamnotmyself.com/2011/02/13/refactor-this-the-gilded-rose-kata/). We have used [Emily Bache's PHP version of the exercise](https://github.com/emilybache/GildedRose-Refactoring-Kata).

## How will we use this Kata

We will do this Kata during the JaduCon#4. We will begin by reading the ["Gilded Rose Requirements"](https://github.com/irinikp/GildedRose-Refactoring-Kata/tree/master/GildedRoseRequirements.txt) which explains what the code is for. 

Then we will do some mob programming, and follow the Driver/Navigators pattern. The Driver sits at the keyboard and types in the code. The Navigators discuss the idea being coded and guide the Driver in creating the code. Participants discuss and work out the possibilities verbally  so everyone is gaining a full understanding of the idea. This creates a sort of collective intelligence of the team as a whole.

The idea of the exercise is to do some deliberate practice, and improve our skills at designing test cases and refactoring. The idea is not to re-write the code from scratch, but rather to practice designing tests, taking small steps, running the tests often, and incrementally improving the design. 

## Installation

The kata uses:

- PHP 7.3+
- [Composer](https://getcomposer.org)

Recommended:
- [Git](https://git-scm.com/downloads)

Clone the repository

```sh
git clone git@github.com:irinikp/GildedRose-Refactoring-Kata.git
```

or

```shell script
git clone https://github.com/irinikp/GildedRose-Refactoring-Kata.git
```

Install all the dependencies using composer

```shell script
cd ./GildedRose-Refactoring-Kata
composer install
```

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [ApprovalTests.PHP](https://github.com/approvals/ApprovalTests.php)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard) 
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Folders

- `src` - contains the two classes:
  - `Item.php` - this class should not be changed.
  - `GildedRose.php` - this class needs to be refactored, and the new feature added.
- `tests` - contains the tests
  - `GildedRoseTest.php` - Starter test.
  - `ApprovalTest.php` - alternative approval test (set to 30 days)
- `Fixture`
  - `texttest_fixture.php` used by the approval test, or can be run from the command line

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the
 root of the PHP project run:

```shell script
composer test
```

On PhpStorm you can add a configuration:
 * Choose `Run` on the menu and then choose `Edit Configurations...`
 * Click on the plus button "Add New Configuration" and Choose `Composer Script`
 * On the Script field choose the option `test`

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening **index.html** in your browser.

On PhpStorm you can add a `Composer Script` configuration and choose the script `test-coverage`

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used. The current code is not
 upto standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On PhpStorm you can add a `Composer Script` configuration and choose the script `check-cs`


### Fix Code

There are may code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On PhpStorm you can add a `Composer Script` configuration and choose the script `fix-cs`

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

On PhpStorm you can add a `Composer Script` configuration and choose the script `phpstan`
