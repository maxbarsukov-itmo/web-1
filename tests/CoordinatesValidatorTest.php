<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../src/php/CoordinatesValidator.php';

class CoordinatesValidatorTest extends TestCase
{
    public static function providerForValidator()
    {
        return [

            'When all coords are invalid' => [-3, -3, 0, false],
            'When only X coord is invalid' => [-3, 1, 1, false],
            'When only Y coord is invalid' => [1, -3, 1, false],
            'When only Z coord is invalid' => [1, 1, 4, false],
            'When some coords are invalid' => [-2, -4, -4, false],
            'When all coords are ok' => [2, 1.12, 3, true],
        ];
    }

    /**
     * @dataProvider providerForValidator
     */
    public function testCheckData($x, $y, $r, $expected)
    {
        $validator = new CoordinatesValidator($x, $y, $r);
        $this->assertSame($expected, $validator->checkData());
    }
}
