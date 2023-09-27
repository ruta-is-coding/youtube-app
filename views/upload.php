<?php
$message = false;
//validacija, ar yra metodas POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //validacija, ar įvesti reikalingi duomenys
    if (
        isset($_POST['url']) and
        isset($_POST['name']) and
        isset($_POST['thumbnail']) and
        strlen($_POST['url']) > 0 and
        strlen($_POST['name']) > 0 and
        strlen($_POST['thumbnail']) > 0
    ) {
        $db->query(
            sprintf(
                "INSERT INTO videos (url, name, description, thumbnail_url, category_id, user_id) VALUES ('%s', '%s', '%s', '%s', %d, %d)",
                $_POST['url'],
                $_POST['name'],
                $_POST['description'],
                $_POST['thumbnail'],
                $_POST['category'],
                $_SESSION['user_id']
            )
        );
        header('Location: ./');
        exit;
    } else {
        $message = 'Not all data is entered';
    }
}
?>

<!-- įspėjimas -->
<?php if ($message) : ?>
    <div class="alert alert-danger"><?= $message ?></div>
<?php endif; ?>
<h1 class="text-center">Upload a video</h1>
<div class="d-flex justify-content-center mt-5">
    <div class="form-container">
        <form method="POST">
            <div class="mt-3">
                <label>Video URL:</label>
                <input type="text" name="url" class="form-control" placeholder="Enter an embed URL from Youtube">
            </div>
            <div class="mt-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter a name of the video (max 150 symbols)">
            </div>
            <div class="mt-3">
                <label>Video description:</label>
                <textarea name="description" class="form-control" placeholder="Describe your video"></textarea>
            </div>
            <div class="mt-3">
                <label>Thumbnail URL:</label>
                <input type="text" name="thumbnail" class="form-control" placeholder="Enter a thumbnail URL">
            </div>
            <div class="mt-3">
                <label>Choose a category:</label>
                <select name="category" class="form-select">
                    <?php foreach ($categories as $row) : ?>
                        <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-success mt-4">Upload</button>
        </form>
    </div>
</div>