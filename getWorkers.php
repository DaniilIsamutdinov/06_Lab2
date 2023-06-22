<?php
require_once "connection.php";

$manager = $_GET['manager'];
$filter = ['manager' => $manager];
$cursor = $collection->distinct('workers', $filter);

$result = array();
echo "Співробітники, які працювали під керівництвом {$manager}:\n";
foreach ($cursor as $worker) {
    echo $worker . "\n";
    array_push($result, $worker);
}

echo "<script> localStorage.setItem('request', '" . json_encode($result) . "'); </script>";
?>