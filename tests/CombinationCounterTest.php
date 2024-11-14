<?php

namespace InterviewProject\Tests;

use InterviewProject\Services\CombinationCounter;
use InterviewProject\Services\Product;

class CombinationCounterTest extends \PHPUnit\Framework\TestCase
{
    public function testCountCombinations()
    {
        $products = [
            new Product([
                'make' => 'Apple',
                'model' => 'iPhone 6s',
                'colour' => 'Red',
                'capacity' => '256GB',
                'network' => 'Unlocked',
                'grade' => 'Grade A',
                'condition' => 'Working',
            ]),
            new Product([
                'make' => 'Apple',
                'model' => 'iPhone 6s',
                'colour' => 'Red',
                'capacity' => '256GB',
                'network' => 'Unlocked',
                'grade' => 'Grade A',
                'condition' => 'Working',
            ]),
            new Product([
                'make' => 'Apple',
                'model' => 'iPhone 7',
                'colour' => 'Black',
                'capacity' => '128GB',
                'network' => 'Unlocked',
                'grade' => 'Grade B',
                'condition' => 'Not Working',
            ]),
        ];
        $counter = new CombinationCounter();
        $result = $counter->countCombinations($products);
        $this->assertArrayHasKey('Apple_iPhone 6s_Red_256GB_Unlocked_Grade A_Working', $result);
        $this->assertEquals(2, $result['Apple_iPhone 6s_Red_256GB_Unlocked_Grade A_Working']['count']);
        $this->assertArrayHasKey('Apple_iPhone 7_Black_128GB_Unlocked_Grade B_Not Working', $result);
        $this->assertEquals(1, $result['Apple_iPhone 7_Black_128GB_Unlocked_Grade B_Not Working']['count']);
    }
}
