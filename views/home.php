<a href="./" class="text-decoration-none">
    <h1 class="text-center">Rūtos video player</h1>
</a>
<form class="input-group mt-3" method='POST' action="./">
    <input type="text" class="form-control" name="search">
    <button class="btn">Search</button>
</form>
<div class="d-flex justify-content-center gap-3 mt-3">
    <?php foreach ($categories as $row) : ?>
        <a href="?category=<?= $row['id'] ?>" class="btn btn-sm orange"><?= $row['name'] ?></a>
    <?php endforeach; ?>
</div>
<div class="row mt-5">
    <?php
    if (isset($videos)) {
        foreach ($videos as $row) : ?>
            <div class="col-4 mb-5">
                <iframe width=100% height="315" src=<?= $row['url'] ?> frameborder="0" allow="autoplay" allowfullscreen class="rounded overflow-hidden"></iframe>
                <a href="?page=video" class="text-decoration-none text-reset"><?= $row['name'] ?></a>
            </div>
    <?php endforeach;
    } else {
        echo "<h5 class='text-center'>No videos available</h5>";
    }
    ?>
</div>