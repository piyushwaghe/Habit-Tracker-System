<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Progress</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>📊 Your Progress</h2>

<a href="index.php" class="btn">⬅ Back to Dashboard</a>

<table>
<tr>
    <th>Habit</th>
    <th>Streak</th>
    <th>Last Completed</th>
    <th>Progress</th>
</tr>

<?php 
$result = mysqli_query($conn, "SELECT * FROM habits");

while($row = mysqli_fetch_assoc($result)) { 

    // Simple progress calculation
    $progress = $row['streak'] * 10; 
    if ($progress > 100) $progress = 100;
?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td>🔥 <?php echo $row['streak']; ?></td>
    <td><?php echo $row['last_completed']; ?></td>

    <td>
        <div style="background:#ddd; border-radius:10px; overflow:hidden;">
            <div style="width:<?php echo $progress; ?>%; background:#28a745; color:white; padding:5px;">
                <?php echo $progress; ?>%
            </div>
        </div>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>