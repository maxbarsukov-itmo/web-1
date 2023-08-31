<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . '/../src/php/AreaChecker.php';

class AreaCheckerTest extends TestCase
{

    public static function providerForAreaCheck()
    {
        return [
            // Points in the top-right quadrant (triangle check)
            'TopRight Inside Triangle Top' => [0.5, 1, 2, true],
            'TopRight Inside Triangle Right' => [1, 1, 4, true],
            'TopRight Outside Triangle Right' => [2, 1, 2, false],
            'TopRight Outside Triangle Top' => [0.6, 1, 2, false],

            // Points in the top-left quadrant (rectangle check)
            'TopLeft Inside Rect Top' => [-0.5, 0.5, 2, true],
            'TopLeft Inside Rect Left' => [-1, 1, 2, true],
            'TopLeft Outside Rect Left' => [-1.1, 1, 2, false],
            'TopLeft Outside Rect Top' => [-1, 2.1, 2, false],

            // Points in the bottom-right quadrant (circle check)
            'BottomRight Inside Circle' => [1, -1, 2, true],
            'BottomRight Outside Circle' => [2, -2, 2, false],

            // Points in the bottom-left quadrant (always outside)
            'BottomLeft Always Outside' => [-0.5, -0.5, 2, false]
        ];
    }

    /**
     * @dataProvider providerForAreaCheck
     */
    public function testIsInArea($x, $y, $r, $expected)
    {
        $this->assertSame($expected, AreaChecker::isInArea($x, $y, $r));
    }
}
