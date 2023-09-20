<?php
//Prisijungimas prie mySQL ir testavimas
try {
    $db = new mysqli('localhost', 'root', '', 'youtube_player');
} catch (Exception $error) {
    echo 'Nepavyko prisijungti';
    exit;
}
//Video duomenų paėmimas
//Patikrinimas, ar query parametre yra kategorijos id
if (isset($_GET['category'])) {
    $id = $_GET['category'];
    $resultFromVideos = $db->query("SELECT * FROM videos WHERE category_id = $id");
} else {
    $resultFromVideos = $db->query("SELECT * FROM videos");
}
if ($resultFromVideos->num_rows > 0) {
    $videos = $resultFromVideos->fetch_all(MYSQLI_ASSOC);
}
//Kategorijos
$resultFromCategories = $db->query('SELECT * FROM categories');
if ($resultFromCategories->num_rows > 0) {
    $categories = $resultFromCategories->fetch_all(MYSQLI_ASSOC);
}
?>

<!-- Duomenų atvaizdavimas -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rūtos video player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <?php
        switch ($page) {
            default:
                include './views/home.php';
        }
        ?>
    </div>
</body>

</html>