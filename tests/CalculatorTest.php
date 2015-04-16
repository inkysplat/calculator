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
     * Setup Method ran before each test below is executed. This creates a new
     * Calculator Object for each Test.
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
        $this->calculator->number(1);
        $this->calculator->add();
        $this->calculator->number(1);
        $this->calculator->multiply();
        $this->calculator->number(3);
        $this->calculator->add();
        $this->calculator->number(3);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '1+1*3+3');

        $result = $this->calculator->equals();
        $this->assertEquals($result, 7);
    }

    /**
     * Tests a simple Addition Calculation
     */
    public function testAdditionCalculation()
    {
        $this->calculator->number(1);
        $this->calculator->add();
        $this->calculator->number(1);
        $result = $this->calculator->equals();
        $this->assertEquals($result,2);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '1+1');
    }

    /**
     * Tests a simple Multiplication Calculation
     */
    public function testMultiplicationCalculation()
    {
        $this->calculator->number(2);
        $this->calculator->multiply();
        $this->calculator->number(2);
        $result = $this->calculator->equals();
        $this->assertEquals($result,4);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '2*2');
    }

    /**
     * Tests that dividing by Zero returns 0. This is a non-sense calculation.
     */
    public function testDividingByZeroCalculation()
    {
        $this->calculator->number(0);
        $this->calculator->divide();
        $this->calculator->number(1);
        $result = $this->calculator->equals();
        $this->assertEquals($result, 0);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '0/1');
    }

    /**
     * Tests a Multiplying by 1
     */
    public function testMultiplicationByOneCalculation()
    {
        $this->calculator->number(2);
        $this->calculator->multiply();
        $this->calculator->number(1);
        $result = $this->calculator->equals();
        $this->assertEquals($result,2);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '2*1');
    }

    /**
     * Testing a Simple Subtraction calculation.
     */
    public function testSubtractionCalculation()
    {
        $this->calculator->number(5);
        $this->calculator->substract();
        $this->calculator->number(2);
        $result = $this->calculator->equals();
        $this->assertEquals($result, 3);

        $calcaulation = $this->calculator->getCalculation();
        $this->assertEquals($calcaulation, '5-2');
    }


    /**
     * Test for invalid Calculation
     *
     * @expectException InvalidCalculationException
     */
    public function testInvalidCalculation()
    {
        try{
            $this->calculator->add()->multiply();
        }catch(\src\Calculator\Exceptions\InvalidCalculationException $e){
            $this->assertEquals($e->getMessage(),"Expecting Number Next");
        }
    }

    /**
     * Test for invalid numbers
     *
     * @expectException InvalidNumberException
     */
    public function testInvalidNumber()
    {
        try{
            $this->calculator->number('A');
        }catch(\src\Calculator\Exceptions\InvalidNumberException $e){
            $this->assertEquals($e->getMessage(),"Invalid Number Provided. Expecting an Integer or Double.");
        }
    }
}