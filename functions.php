<?php declare(strict_types = 1);

namespace UnitTests;

/** 
* Compare the Triplets
* Given two space-separated integer triplets representing scores for two students, compare the
* respective integer in each triplet and award a point to the student with the higher score.
* No point is award in case of a tie.
*
* @param six integers x where 1 <= x <= 100
* @return two integers denoting comparison points earned by a and b
**/
function compareTriplets(int $a0, int $a1, int $a2, int $b0, int $b1, int $b2){
    $aliceTriplet = array($a0, $a1, $a2);
    $bobTriplet = array($b0, $b1, $b2);
    $aliceScore = 0;
    $bobScore = 0;
    $returnComparison = array();
    
    for($i=0;$i<count($aliceTriplet);$i++) {
        if($aliceTriplet[$i] > $bobTriplet[$i]) {
            $aliceScore++;
        }
        elseif($aliceTriplet[$i] < $bobTriplet[$i]) {
            $bobScore++;
        }
    }
    $returnComparison[] = $aliceScore;
    $returnComparison[] = $bobScore;
    
    return $returnComparison;
}

/** 
* Diagonal Difference
* Given a square matrix of size N x N, calculate the absolute difference between the sums of its diagonals.
* Assumptions are that N > 0 and all elements are integers.
*
* @param multidimensional array of N x N integers such that -100 <= x <= 100
* @return integer denoting absolute difference between two sums of matrix's diagonals
**/
function diagonalDifference(array $matrix) {
    $primDiag = 0;
    $secDiag = 0;
    $count = 0;
    $count2 = count($matrix[0])-1;
    for($i=0;$i<count($matrix[0]);$i++) {
        $primDiag += $matrix[$i][$count];
        $secDiag += $matrix[$i][$count2];
        $count++;
        $count2--;
    }

    return abs($primDiag-$secDiag);
}

/** 
* 2D Array Max Sum Diagonal
* Given a 6 x 6 2D Array, find the maximum hourglass sum, where an hourglass is defined as
* a subset of the values with indices falling in the following graphical pattern:
*   a b c
*     d
*   e f g
*
* @param multidimensional array A of 6 x 6 integers such that -9 <= A[i][j] <= 9
* @return integer denoting largest hourglass sum found in A
**/
function arrayMaxDiagonal(array $matrix) {
    $maxSum = PHP_INT_MIN;
    for($i=0; $i<4; $i++) {
        for($j=0; $j<4; $j++) {
            $hourglassSum = array_sum(array($matrix[$i][$j],
                                            $matrix[$i][$j+1],
                                            $matrix[$i][$j+2]));
            $hourglassSum += $matrix[$i+1][$j+1];
            $hourglassSum += array_sum(array($matrix[$i+2][$j],
                                            $matrix[$i+2][$j+1],
                                            $matrix[$i+2][$j+2]));
            if($hourglassSum > $maxSum) {
                $maxSum = $hourglassSum;
            }
        }
    }
    return $maxSum;
}