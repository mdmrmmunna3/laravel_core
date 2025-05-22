<?php
// for ($i = 1; $i <= 10; $i++) {
//     if ($i == 5) {
//         break;
//     }
//     echo $i . ' ';
// }

// echo "<br>";

// for ($i = 1; $i <= 10; $i++) {
//     if ($i == 5) {
//         continue;
//     }
//     echo $i . " ";
// }


// Write a function to reverse a string without using strrev().
// function reverse($str)
// {
//     $reverstr = "";
//     for ($i = strlen($str) - 1; $i >= 0; $i--) {
//         $reverstr .= $str[$i];
//     }
//     return $reverstr;
// }
// echo reverse("munna");

// function reverseWithstrrev($str)
// {
//     return strrev($str);
// }
// echo reverseWithstrrev("bangladesh");

// function removeDuplicate($arr)
// {
//     return array_values(array_unique($arr));

// }

// $numbers = [1, 1, 2, 56, 2, 6, 6, 7, 8];
// print_r(removeDuplicate($numbers));

//  Implement a function to check if a string is a palindrome

// function isPalindrome($str)
// {
//     return strtolower($str) === strtolower(strrev($str));
// }

// echo isPalindrome("racecar") ? 'is palindrome' : "is not palindrome";

// Write a PHP function to find the second largest number in an array. 

// function secondLargest($arr)
// {
//     $arra = array_unique($arr); // findout unqiue value of an array
//     rsort($arra); // sort a value in decesnding order
//     return $arra[1] ?? null; // retrun secondlargest number of value other wise null
// }

// $array = [45, 1, 21, 65, 100, 78, 32, 99, 10, 12];
// echo secondLargest($array);

// Write a function to check whether a number is prime.

function isPrime($num)
{
    if ($num < 2)
        return false;

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

$num = 7;
echo $num;
echo isPrime($num) ? " is prime number" : " is not prime number";

echo "<br>";

// How would you implement a recursive function to calculate the factorial of a number?

function factorial($num)
{
    return ($num < 1) ? 1 : $num * factorial($num - 1);
}

echo factorial(5);

echo "<br>";

function facto($n)
{
    $fact = 1;
    if ($n <= 1)
        return 1;
    for ($i = 2; $i <= $n; $i++) {
        $fact *= $i;
    }
    return $fact;
}

echo facto(6);

echo "<br>";

// Write a function to generate the Fibonacci series up to n terms.

function fibonacci($n)
{
    $a = 0;
    $b = 1;

    for ($i = 2; $i < $n; $i++) {
        $next = $a + $b;
        $a = $b;
        $b = $next;
        echo $b . " ";
    }
    return $b;
}

echo fibonacci(10);

echo "<br>";

function fibo($n)
{
    $fib = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

print_r(fibo(10));

echo "<br>";

//  How do you find the most frequent element in an array?

function mostFrequent($arr)
{
    $counts = array_count_values($arr);
    arsort($counts);
    // return $counts;
    return array_key_first($counts);
}

$numbers = [45, 12, 1, 3, 5, 8, 1, 3, 2, 2, 1, 1, 5,];
// print_r(mostFrequent($numbers));
echo mostFrequent($numbers);

?>