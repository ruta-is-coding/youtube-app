<?php foreach ($videos as $video) : ?>
    <h1 class="text-center"><?= $video['name'] ?></h1>
    <div class="row mt-5">
        <div class="col-9">
            <iframe width="840" height="472.5" src="<?= $video['url'] ?>" frameborder="0" allow="autoplay" allowfullscreen></iframe>
        </div>
        <div class="col-3">
            <h5>Description:</h5>
            <p><?= nl2br($video['description']) ?></p>
            <h5>Uploaded by:</h5>
            <?php
            //Vieno user'io duomenys
            $user = $db->query('SELECT * FROM users WHERE id=' . $video['user_id'])->fetch_all(MYSQLI_ASSOC)[0];
            ?>
            <p><?= $user['username'] ?></p>
        </div>
    </div>
<?php endforeach; ?>