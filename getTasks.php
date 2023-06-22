<?php
require_once "connection.php";

$project = $_GET['projectName'];
$date = strtotime($_GET['date']);

$filter = [
    'project' => $project,
    '$and' => [
        ['start_time' => ['$lte' => $date]],
        ['end_time' => ['$gte' => $date]],
    ],
];

$cursor = $collection->find($filter);
$result = array();
array_push($result, $project);

foreach ($cursor as $task) {
    echo "Завдання: {$task['title']} <br>";
    echo "Опис: {$task['description']}<br>";
    array_push($result, $task['title']);
}
echo "<script> localStorage.setItem('request', '" . json_encode($result) . "'); </script>";
?>