<?php
//Prisijungimas prie mySQL ir testavimas
try {
    $db = new mysqli('localhost', 'root', '', 'youtube_player');
} catch (Exception $error) {
    echo 'Nepavyko prisijungti';
    exit;
}
//UTF-8 koduotės simbolių nustatymas
$db->set_charset("utf8mb4");
//Video duomenų paėmimas
//Patikrinimas, ar yra POST metodu siunčiami paieškos duomenys
if (isset($_POST['search'])) {
    $name = $_POST['search'];
    $resultFromVideos = $db->query("SELECT * FROM videos WHERE name LIKE '%$name%'");
    //Patikrinimas, ar query parametre yra kategorijos id
} elseif (isset($_GET['category'])) {
    $id = $_GET['category'];
    $resultFromVideos = $db->query("SELECT * FROM videos WHERE category_id = $id");
} else {
    $resultFromVideos = $db->query("SELECT * FROM videos");
}
//fetchinimas
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : false;
        switch ($page) {
            case "video":
                include './views/video.php';
                break;
            default:
                include './views/home.php';
        }
        ?>
    </div>
</body>

</html>