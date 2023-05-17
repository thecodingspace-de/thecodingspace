<?php
include('loginWatcher.php');
include('admin.php');
include('config.php');
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "SELECT * FROM blog";
$result = $db->query($sql);
$blogEntries = $result->fetchAll(PDO::FETCH_ASSOC);

?>
    <table>
        <tr>
            <td><strong>Titel</strong></td>
            <td><strong>Text</strong></td>
            <td><strong>Bild</strong></td>
            <td><strong>Bearbeiten</strong></td>
        </tr>
<?php

foreach ($blogEntries as $entry) {
    $id = $entry['id'];
    $title = $entry['title'];
    $text = $entry['text'];
    $imagePath = $entry['img_path'];

    ?>
        <tr>
            <td><?php echo $title; ?></td>
            <td><?php echo $text; ?></td>
            <td><?php echo "<img src='$imagePath' alt='Blog Entry Image'>"; ?></td>
            <td><a onclick="bearbeiten(<?php echo $id;?>)">Bearbeiten</a></td>
        </tr>
    <?php
}
?>
    </table>
    <script>
        function bearbeiten(id){
            console.log(id);
        }
    </script>
    <style>
        img{
            height: 60px;
        }
        table{
            border-style: solid;
        }
        td{
            border-style: solid;
        }
    </style>

