<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Establishing the connection
$con = mysqli_connect("localhost", "root", "", "bibliomania");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to select admin
$query = "SELECT * FROM admin WHERE admin_id = '001'";
$result = mysqli_query($con, $query);

// Check if query executed successfully
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetching the result
while ($userinfo = mysqli_fetch_assoc($result)) {
    $admin_id = $userinfo['admin_id'];
}

// Close the connection
mysqli_close($con);
?>
<div>
    <button>Hi <?php echo isset($admin_id) ? $admin_id : 'Guest'; ?></button>
</div>

    <div>
        <button>Hi <?php echo $admin_id; ?></button>
    </div>
</body>
</html>