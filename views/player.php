<?php foreach ($videos as $video) : ?>
    <h1 class="text-center"><?= $video['name'] ?></h1>
    <div class="mt-3">
        <div class="d-flex justify-content-center">
            <iframe width="840" height="472.5" src="<?= $video['url'] ?>" frameborder="0" allow="autoplay" allowfullscreen></iframe>
        </div>
        <div class="mt-5">
            <?php
            //Peržiūrų atnaujinimas
            $db->query('UPDATE videos SET view_count=view_count+1 WHERE id =' . $video['id']);
            ?>
            <h5>Views:</h5>
            <p><?= $video['view_count']; ?></p>
            <h5>Uploaded by:</h5>
            <?php
            //Vieno user'io duomenys
            $user = $db->query('SELECT * FROM users WHERE id=' . $video['user_id'])->fetch_all(MYSQLI_ASSOC)[0];
            ?>
            <p><?= $user['username'] ?></p>
            <h5>Description:</h5>
            <p><?= nl2br($video['description']) ?></p>
        </div>
    </div>
<?php endforeach; ?>