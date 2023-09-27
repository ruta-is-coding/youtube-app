<?php
$page = 1;
?>

<nav class="d-flex justify-content-center">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link disabled" href="&page=<?= $page - 1 ?>">Previous</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="&page=<?= $page + 1 ?>">Next</a>
        </li>
    </ul>
</nav>