
<?php



if (!isset($_POST['values']) || count($_POST['values']) != 8) 
{
    exit("Please return to the form and enter all 8 values.");

}

$values = $_POST['values'];


echo "<p>Original Array</p>";

foreach ($values as $value) 

{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Original Array Showing Keys</p>";

foreach ($values as $key => $value) 

{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}


$deleted = $values;


unset($deleted[0], $deleted[2]);


echo "<p>Array After 2 Elements Deleted</p>";

foreach ($deleted as $value) 
    
{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Array After 2 Elements Deleted With Keys</p>";

foreach ($deleted as $key => $value) 
    
{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}


$gaps = array_values($deleted);


echo "<p>Array After Gaps Removed</p>";


foreach ($gaps as $value)
    
{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Array After Gaps Removed With Keys</p>";


foreach ($gaps as $key => $value) 
    
{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}


$ascending = $values;


sort($ascending);

echo "<p>Array After Ascending Order</p>";

foreach ($ascending as $value) 


{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Array After Ascending Order With Keys</p>";

foreach ($ascending as $key => $value) 
    
{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}


$descending = $values;


rsort($descending);


echo "<p>Array After Descending Order</p>";


foreach ($descending as $value) 

{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Array After Descending Order With Keys</p>";


foreach ($descending as $key => $value) 
    
{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}


$byValue = $values;


asort($byValue);

echo "<p>Array After Sort Ascending Order According To Values And Keeping Keys</p>";


foreach ($byValue as $value) 
    
{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Array After Sort Ascending According To Values And Keeping Keys With Keys</p>";


foreach ($byValue as $key => $value) 
    
{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}


$byKey = $values;


ksort($byKey);


echo "<p>Array Ascending Order According To Keys</p>";

foreach ($byKey as $value) 
    
{
    echo htmlspecialchars($value) . "<br>";

}

echo "<p>Array Ascending Order According To Keys With Keys</p>";

foreach ($byKey as $key => $value) 
    
{
    echo "[" . $key . "] => " . htmlspecialchars($value) . "<br>";

}



?>