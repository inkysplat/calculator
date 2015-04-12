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
        $this->calculator->number(1);
        $this->calculator->add();
        $this->calculator->number(1);
        $this->calculator->multiply();
        $this->calculator->number(3);
        $this->calculator->add();
        $this->calculator->number(3);
        $result = $this->calculator->calculate();

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
        $result = $this->calculator->calculate();
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
        $result = $this->calculator->calculate();
        $this->assertEquals($result,4);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '2*2');
    }

    /**
     * Tests a Multiplying by 1
     */
    public function testMultiplicationByOneCalculation()
    {
        $this->calculator->number(2);
        $this->calculator->multiply();
        $this->calculator->number(1);
        $result = $this->calculator->calculate();
        $this->assertEquals($result,2);

        $calculation = $this->calculator->getCalculation();
        $this->assertEquals($calculation, '2*1');
    }

    /**
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