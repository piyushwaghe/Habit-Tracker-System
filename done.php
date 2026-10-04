<?php
include "db.php";

$id = $_GET['id'];

mysqli_query($conn, "
UPDATE habits 
SET streak = streak + 1, last_completed = CURDATE() 
WHERE id = $id
");

header("Location: index.php");
?>