<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Habit Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>✨ Habit Tracker</h2>

<!-- Buttons -->
<a href="add.php" class="btn">+ Add New Habit</a>
<a href="progress.php" class="btn">📊 View Progress</a>

<!-- Table -->
<table>
<tr>
    <th>Habit</th>
    <th>Streak</th>
    <th>Last Completed</th>
    <th>Action</th>
</tr>

<?php 
$result = mysqli_query($conn, "SELECT * FROM habits");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { 
?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td>🔥 <?php echo $row['streak']; ?></td>
    <td><?php echo $row['last_completed']; ?></td>

    <td class="action">
        <a class="done" href="done.php?id=<?php echo $row['id']; ?>">Done</a>
        <a class="delete" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php 
    }
} else {
?>
<tr>
    <td colspan="4">No habits added yet 😔</td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>