<?php
require_once "connection.php";

$manager = $_GET['manager'];
$filter = ['manager' => $manager];
$count = $collection->countDocuments($filter);

$result = array();
echo "Кількість проєктів для керівника {$manager}: {$count}\n";
array_push($result, $count);

echo "<script> localStorage.setItem('request', '" . json_encode($result) . "'); </script>";
?>