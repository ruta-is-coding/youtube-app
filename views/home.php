<a href="./" style="text-decoration:none">
    <h1 class="text-center" style="color: #FFBF00">Youtube App</h1>
</a>
<div class="d-flex justify-content-center gap-3 mt-5">
    <?php foreach ($categories as $row) : ?>
        <a href="?category=<?= $row['id'] ?>" class="btn btn-sm" style="color: white; background: #FFBF00" ;><?= $row['name'] ?></a>
    <?php endforeach; ?>
</div>
<div class="row mt-5">
    <?php foreach ($videos as $row) : ?>
        <div class="col-4 mb-3">
            <iframe width=100% height="315" src=<?= $row['url'] ?> frameborder="0" allow="autoplay" allowfullscreen class="rounded overflow-hidden"></iframe>
        </div>
    <?php endforeach; ?>
</div>