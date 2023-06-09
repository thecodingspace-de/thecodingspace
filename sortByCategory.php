<?php
include('conf/config.php');
include('navbar.php');
$category = $_GET['category'];
$heckCategory = $category;
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
if($category == "Alle"){
    $sql = "SELECT * FROM blog";
}
else{
    $sql = "SELECT * FROM blog WHERE category = '$category'";
}
$result = $db->query($sql);
$blogEntries = $result->fetchAll(PDO::FETCH_ASSOC);
$sql = "SELECT * FROM blog";
$result = $db->query($sql);
$blogEntriesCategory = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <div class='blog-container' style='width: 100%'>
        <div class="categories">
            <?php
                $uniqueCategories = array_unique(array_column($blogEntriesCategory, 'category'));
                echo '<div class="category"';
                if($category == "Alle"){
                    echo 'style="color: green;"';
                }
                echo 'onclick=sortCategory(' . '"' . 'Alle' . '"' . ')>' . 'Alle' . '</div>';
                foreach ($uniqueCategories as $category) {
                    echo '<div class="category"';
                    if($category == $heckCategory){
                        echo 'style="color: green;"';
                    }
                    echo 'onclick=sortCategory(' . '"' .$category . '"' . ')>' . $category . '</div>';
                }
            ?>
        </div>
    </div>

    <?php
        foreach ($blogEntries as $entry) {
            $id = $entry['id'];
            $created = $entry['created_at'];
            $created = new DateTime($created);
            $created = $created->format("d/m/Y");
            $title = $entry['title'];
            $text = $entry['text'];
            $imagePath = $entry['img_path'];
            $text = strlen($text) > 200 ? substr($text, 0, 200) . "..." : $text;

            echo "<div class='blog-container'>
                    <div class='blog-entry' onclick=showBlogEntry('$id')>
                        <div class='created'>
                            $created
                        </div>
                        <div class='blog-title'>
                            <div>$title</div>
                        </div>
                        <div class='blog-img'>
                            <img class='blog-img-element' src='$imagePath'>
                        </div>
                        <div class='blog-text-container'>
                            <div class='blog-text'>
                                $text
                            </div>
                        </div>
                    </div>
                </div>";
        }
    ?>
    <br>
    <br>
    <br>
    <script>
        function sortCategory(category){
            var url = "sortByCategory.php?category=" + encodeURIComponent(category)
            window.location.href = url
        }
        function showBlogEntry(id){
            var url = "showBlogEntry.php?id=" + encodeURIComponent(id)
            window.location.href = url
        }
    </script>
</body>
</html>

<?php
include('impressumElement.php');
?>