# Calculator
# __By Adam Nicholls__

## General Usage

To use the Calculator simply instantiate the Calculator object and use the *number()*, *add()*, *subtract()*, *multiple()*, and *divide()* methods.

To calculate your sum simply call the *equals()* method.

Example below (using method chaining);

```php
$calculator = new src\Calculator\Calculator();
$result = $calculator->number(1)->add()->number(1)->multiply()->number(3)->add()->number(3)->equals();
var_dump($result); //int(7)
```

The same example can be written as (without method chaining);

```php
$calculator = new src\Calculator\Calculator();
$calculator->number(1);
$calculator->add()
$calculator->number(1);
$calculator->multiply();
$calculator->number(3);
$calculator->add();
$calculator->number(3);
$result = $calculator->equals();
var_dump($result); //int(7)
```

### Error Handling & Exceptions

The __number()__ method expects a number, this can be either a integer or a double. Failure to provide a valid number will throw an *InvalidNumberException*.

### Implementation Notes

A consideration for this Calculator is how it deals with precedence of the operands in mathematics.

PHP as a language deals with this already so to make our life easier in this simple example we've used *eval()*.

In a scenario where user input maybe required the use of *eval()* isn't recommended as a user can execute PHP code on the server. This poses a security risk!

As the calculation is stored as an *Array()* an alternative would be to iterate over the parts and process the numbers to the left and right of the appropriate operands.


## Tests

To demonstrate the calculator and confirm it's abilities you can execute the PHPUnit tests, these are located in the __test__ directory.

To run the tests you'll need to install PHPUnit via Composer (if you don't have PHPUnit installed via PEAR).

Example below

```bash
composer install
php vendor/bin/phpunit
```

