<?php

function getClosestNumbers($options, $number): array {

    sort($options);

    $closestNumbers = [];

    foreach ($options as $option) {
      
        $difference = abs($number - $option);

        if (empty($closestNumbers)) {
            $closestNumbers[] = $option;
        } else {
            
            if ($difference < abs($number - $closestNumbers[0])) {
                $closestNumbers = [$option];
            }

            elseif ($difference == abs($number - $closestNumbers[0])) {
                $closestNumbers[] = $option;
            }
        }
    }

    return $closestNumbers;
}

$options = [-908, -852, -475, -355, -102, -100, -55, -25, -18, -7, -6, -5, 0, 1, 7, 8, 99, 101, 122, 147, 5025, 7410];

$result1 = getClosestNumbers($options, 90);
$result2 = getClosestNumbers($options, 100);

echo "Za broj 90 funkcija vraća niz: " . implode(", ", $result1) . "\n";
echo "Za broj 100 funkcija vraća niz: " . implode(", ", $result2) . "\n";

?>