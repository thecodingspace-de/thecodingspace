<?php
$title = $_POST['title'];
$text = $_POST['text'];
$image = $_FILES['image'];

if (!empty($title) && !empty($text) && $image['error'] === 0) {
    $uploadDir = 'blogImgs/';
    $uploadedFilePath = $uploadDir . basename($image['name']);
    
    if (move_uploaded_file($image['tmp_name'], $uploadedFilePath)) {
        include('config.php');
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "INSERT INTO blog (title, text, img_path) VALUES ('$title', '$text', '$uploadedFilePath')";
        $db->exec($sql);
        header('Location: admin.php');
        exit;
    } else {
        echo "File upload failed!";
    }
} else {
    echo "Please fill in all the required fields and ensure the image upload was successful.";
}