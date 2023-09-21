<?php foreach ($videos as $video) : ?>
    <h1 class="text-center"><?= $video['name'] ?></h1>
    <div class="row mt-5">
        <div class="col-9">
            <iframe width="840" height="472.5" src="<?= $video['url'] ?>" frameborder="0" allow="autoplay" allowfullscreen></iframe>
        </div>
        <div class="col-3">
            <h5 style="color: #ffbf00;">Description:</h5>
            <p><?= $video['description'] ?></p>
            <h5 style="color: #ffbf00;">Uploaded by:</h5>
            <?php
            //User'io duomenys
            $resultFromUsers = $db->query('SELECT * FROM users WHERE id=' . $video['user_id']);
            if ($resultFromUsers->num_rows > 0) {
                $user = $resultFromUsers->fetch_all(MYSQLI_ASSOC)[0];
            }
            ?>
            <p><?= $user['username'] ?></p>
        </div>
    </div>
<?php endforeach; ?>