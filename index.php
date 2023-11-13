<?php
$tasks = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['task']) && $_POST['task'] != '') {
       $tasks[] = $_POST['task'];
   }
}

if (isset($_GET['task']) && is_numeric($_GET['task'])) {
   unset($tasks[$_GET['task']]);
   $tasks = array_values($tasks);
}

if (isset($_GET['complete']) && is_numeric($_GET['complete'])) {
   $tasks[$_GET['complete']] = 'x ' . $tasks[$_GET['complete']];
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Administración de tareas</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 Tarea: <input type="text" name="task">
 <input type="submit">
</form>

<ul>
<?php foreach ($tasks as $key => $task): ?>
   <li>
       <a href="?complete=<?php echo $key; ?>"><?php echo $task[0] == 'x' ? str_replace('x ', '', $task) : $task; ?></a>
       <a href="?task=<?php echo $key; ?>">x</a>
   </li>
<?php endforeach; ?>
</ul>

</body>
</html>
