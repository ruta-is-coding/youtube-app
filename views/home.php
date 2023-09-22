<a href="./" class="text-decoration-none">
    <h1 class="text-center">Rūtos video player</h1>
</a>
<form class="input-group mt-3" method='POST' action="./">
    <input type="text" class="form-control" name="search">
    <button class="btn orange">Search</button>
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
                <a href="?page=player&id=<?= $row['id'] ?>">
                    <img src=<?= $row['thumbnail_url'] ?> alt=<?= $row['name'] ?> class="rounded overflow-hidden" style="max-width: 100%">
                </a>
                <a href="?page=player&id=<?= $row['id'] ?>" class="text-decoration-none text-reset"><?= $row['name'] ?></a>
            </div>
    <?php endforeach;
    } else {
        echo "<h5 class='text-center'>No videos available</h5>";
    }
    ?>
</div>