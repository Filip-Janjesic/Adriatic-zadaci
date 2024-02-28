<?php
function find($arrayA, $arrayB, $arrayC) {
    $commonValues = array_intersect($arrayA, $arrayB, $arrayC);
    $uniqueA = array_diff($arrayA, $arrayB, $arrayC);
    $uniqueB = array_diff($arrayB, $arrayA, $arrayC);
    $uniqueC = array_diff($arrayC, $arrayA, $arrayB);

    echo "Array A: " . json_encode($arrayA) . PHP_EOL;
    echo "Array B: " . json_encode($arrayB) . PHP_EOL;
    echo "Array C: " . json_encode($arrayC) . PHP_EOL;

    echo "u sva tri niza: " . json_encode(array_values($commonValues)) . PHP_EOL;
    echo "samo u nizu \$arrayA = " . json_encode(array_values($uniqueA)) . PHP_EOL;
    echo "samo u nizu \$arrayB = " . json_encode(array_values($uniqueB)) . PHP_EOL;
    echo "samo u nizu \$arrayC = " . json_encode(array_values($uniqueC)) . PHP_EOL;
}

$arrayA = ['a', 'b', 'c', 'dd', '234', '22', 'rc'];
$arrayB = ['a', 'b2', 'c', 'dad', 'rc', '24', '222'];
$arrayC = ['222', 'a', 'be', 'rc', '234', '22', 'pp'];

find($arrayA, $arrayB, $arrayC);

?>