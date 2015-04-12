# Calculator
# __By Adam Nicholls__

## General Usage

To use the Calculator simply instantiate the Calculator object and use the *number()*, *add()*, *subtract()*, *multiple()*, and *divide()* methods.

To calculate your sum simply call the *equals()* method.

Example below

```php
$calculator = new src\Calculator\Calculator();
$result = $calculator->number(1)->add()->number(1)->multiply()->number(3)->add()->number(3)->equals();
var_dump($result); //int(3)
```

### Implementation Notes

A consideration for this Calculator is how it deals with precedence of the operands in mathematics.

PHP as a language deals with this already, so to make life easier in this simple example we've used *eval()*.

In a scenario where user input maybe required the use of *eval()* isn't recommended as user's can potentially execute PHP code on the server, posing a security risk.

As the calculation is stored in the *Calculator()->calculation* variable an alternative would be to iterate over the parts and process the numbers to the left and right of the appropriate operands.


## Tests

To demonstrate the calculator and confirm it's abilities you can execute the PHPUnit tests, these are located in the __test__ directory.

To run the tests you'll need to install PHPUnit via Composer (if you don't have PHPUnit installed via PEAR).

Example below

```bash
composer install
php vendor/bin/phpunit
```

