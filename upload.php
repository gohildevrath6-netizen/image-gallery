<?php
session_start();

$target_dir = "uploads/";

// Create folder if not exists (IMPORTANT)
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$file_name = $_FILES["image"]["name"];
$file_tmp = $_FILES["image"]["tmp_name"];
$file_size = $_FILES["image"]["size"];

$target_file = $target_dir . basename($file_name);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Validation: size
if ($file_size > 2000000) {
    echo "File too large (Max 2MB)";
    exit;
}

// Validation: type
if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
    echo "Only JPG, JPEG, PNG allowed";
    exit;
}

// Upload
if (move_uploaded_file($file_tmp, $target_file)) {

    $_SESSION['uploads'][] = $file_name;

    echo "Upload successful! 🎉<br><br>";
    echo "<a href='gallery.php'>Go to Gallery</a>";

} else {
    echo "Upload failed ❌";
}
?>