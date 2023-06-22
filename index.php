<?php
	require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>lb2</title>
	</head>
	<body>
		<p>виконані завдання за обраним проєктом на зазначену дату;</p>
		<form action="getTasks.php" method="GET">
			<select name="projectName">
				<?php
				$cursor = $collection->distinct('project');
				foreach($cursor as $document){
					echo '<option value="' . $document . '">' . $document . '</option>';
				}
                ?>
			</select>
			<input type="date" name="date" value="2021-06-24">
			<input type="submit" value="Отримати">
		</form>

		<p>кількість проєктів зазначеного керівника;</p>
		<form action="projectsAmount.php" method="GET">
			<select name="manager">
				<?php
				$cursor = $collection->distinct('manager');
				foreach($cursor as $document){
					echo '<option value="' . $document . '">' . $document . '</option>';
				}
                ?>
			</select>
			<input type="submit" value="Отримати">
		</form>

		<p>співробітників, які працювали під керівництвом обраного керівника.</p>
		<form action="getWorkers.php" method="GET">
		<select name="manager">
				<?php
				$cursor = $collection->distinct('manager');
				foreach($cursor as $document){
					echo '<option value="' . $document . '">' . $document . '</option>';
				}
                ?>
			</select>
			<input type="submit" value="Отримати">
		</form>

		<p>Результат останнього запиту: </p>
			<script>
				(function displayRequest() {
			const data = localStorage.getItem("request");
			const res = JSON.parse(data);
			if (res) {
				var output = "";
				res.forEach(function(item) {
					output += " " + item;
				});
				document.write("<p>"+ output);
			} else {
				document.write("<p> Запиту ще не зроблено!");
			}
			})();
			</script>
	</body>
</html>
