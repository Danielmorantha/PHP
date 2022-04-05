<?php

//Daniel Morantha

$MAX = 10000;
 

$primes = array();
 

function sieveSundaram()
{
    global $MAX, $primes;
     

    $marked = array_fill(0, (int)($MAX / 2) +
                                100, false);
 

    for ($i = 1; $i <= (sqrt($MAX) - 1) / 2; $i++)
        for ($j = ($i * ($i + 1)) << 1;
             $j <= $MAX / 2; $j = $j + 2 * $i + 1)
            $marked[$j] = true;
 

    array_push($primes, 2);
 

    for ($i = 1; $i <= $MAX / 2; $i++)
        if ($marked[$i] == false)
            array_push($primes, 2 * $i + 1);
}
 

function findPrimes($n)
{
    global $MAX, $primes;
     

    if ($n <= 2 || $n % 2 != 0)
    {
        print("Invalid Input \n");
        return;
    }
 

    for ($i = 0; $primes[$i] <= $n / 2; $i++)
    {

        $diff = $n - $primes[$i];

        if (in_array($diff, $primes))
        {

            print($primes[$i] . " + " .
                  $diff . " = " . $n . "\n");
            return;
        }
    }
}
 

sieveSundaram();
 

findPrimes(8);
echo"</br>";
findPrimes(20);
echo"</br>";
 

?>