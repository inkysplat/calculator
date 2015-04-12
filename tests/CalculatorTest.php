<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 12/04/15
 * Time: 21:26
 */

/**
 * Class CalculatorTest
 */
class CalculatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup Method ran before each test below is executed.
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Just test we've got a Calculator Loaded, just a sanity check whilst setting up
     * PHPUnit.
     */
    public function testCalculatorLoaded()
    {
        $calculator = new \src\Calculator\Calculator();
        $this->assertEquals($calculator->getName(), 'src\Calculator\Calculator');
    }
}