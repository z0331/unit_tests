<?php declare(strict_types = 1);

namespace UnitTests;

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';

use PHPUnit\Framework\TestCase;

final class functionsTest extends TestCase {

    public function testCompareTriplets() {

        //Tie
        $returnComparison = compareTriplets(0, 0, 0, 0, 0, 0);
        $this->assertEquals($returnComparison[0], 0);

        //Tie with non-zero scores
        $returnComparison = compareTriplets(5, 5, 5, 5, 5, 5);
        $this->assertEquals($returnComparison[0], 0);

        //Alice wins
        $returnComparison = compareTriplets(0, 1, 0, 0, 0, 0);
        $this->assertGreaterThan($returnComparison[1], $returnComparison[0]);

        //Bob wins
        $returnComparison = compareTriplets(1, 1, 1, 2, 2, 2);
        $this->assertLessThan($returnComparison[1], $returnComparison[0]);
    }

    /**
     * @dataProvider diagonalDifferenceProvider
     */
    public function testDiagonalDifference($testArray, $expected) {

        $diagonalDifference = diagonalDifference($testArray);
        $this->assertEquals($expected, $diagonalDifference);

    }

    public function diagonalDifferenceProvider() {
        return [
            [
                [
                    [11, 2, 4],
                    [4, 5, 6],
                    [10, 8, -12]
                ],
                15
            ],
            [
                [
                    [0, 0],
                    [0, 0]
                ],
                0
            ],
            [
                [
                    [23, 5, -12, 66, 0],
                    [63, -90, 34, -2, 9],
                    [99, 16, -35, 17, 0],
                    [21, 2, 60, -53, 95],
                    [7, -30, -12, 58, 1]
                ],
                126
            ],
        ];
    }

    /**
     * @dataProvider arrayProvider
     */
    public function testArrayMaxDiagonal($testArray, $expected) {
        
        $maxDiagonalSum = arrayMaxDiagonal($testArray);
        $this->assertEquals($expected, $maxDiagonalSum);

    }

    public function arrayProvider() {
        return [
            [
                [
                    [1, 1, 1, 0, 0, 0],
                    [0, 1, 0, 0, 0, 0],
                    [1, 1, 1, 0, 0, 0],
                    [0, 0, 2, 4, 4, 0],
                    [0, 0, 0, 2, 0, 0],
                    [0, 0, 1, 2, 4, 0]
                ],
                19
            ],
            [
                [
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0]
                ],
                0
            ],
            [
                [
                    [-5, -1, -2, -2, 0, 0],
                    [-1, -1, -1, -0, -3, -2],
                    [-1, -1, -1, -3, -4, -2],
                    [-3, -1, -2, -4, -4, -4],
                    [-4, -5, -2, -2, -1, -1],
                    [-5, 0, -1, -2, -4, 0]
                ],
                -10
            ]
        ];
    }

}