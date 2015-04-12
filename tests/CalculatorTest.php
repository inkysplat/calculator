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
     * @var src\Calculator\Calculator
     */
    private $calculator;

    /**
     * Setup Method ran before each test below is executed.
     */
    public function setUp()
    {
        parent::setUp();
        $this->calculator = new \src\Calculator\Calculator();

    }

    /**
     * Just test we've got a Calculator Loaded, just a sanity check whilst setting up
     * PHPUnit.
     */
    public function testCalculatorLoaded()
    {

        $this->assertEquals($this->calculator->getName(), 'src\Calculator\Calculator');
    }

    /**
     * Example Calculation Given in the Test
     */
    public function testExampleCalculation()
    {
        $result = $this->calculator->calculate('1+1*3+3');
        //eval('$result=1+1*3+3;');
        $this->assertEquals($result, 7);
    }

    public function testAdditionCalculation()
    {
        $result = $this->calculator->number(1)->add()->number(1)->calculate();
        $this->assertEquals($result,2);
    }
}