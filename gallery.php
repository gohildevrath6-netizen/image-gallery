<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
</head>
<body>

<h2>Image Gallery</h2>

<?php
$folder = "uploads/";

// Check if folder exists
if (is_dir($folder)) {

    $files = scandir($folder);

    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            echo "<img src='$folder$file' width='150' height='150' style='margin:10px;'>";
        }
    }

} else {
    echo "Uploads folder not found!";
}
?>

<hr>

<h3>Your Uploaded Images (Session)</h3>

<?php
if (isset($_SESSION['uploads'])) {
    foreach ($_SESSION['uploads'] as $img) {
        echo $img . "<br>";
    }
} else {
    echo "No uploads yet.";
}
?>

<br><br>
<a href="index.php">Upload More</a>

</body>
</html>