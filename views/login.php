<?php
$message = false;
//validacija, ar yra metodas POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //validacija, ar įvesti visi duomenys
    if (
        isset($_POST['email']) and
        isset($_POST['password']) and
        strlen($_POST['email']) > 0 and
        strlen($_POST['password']) > 0
    ) {
        //prisijungimo validacija
        //pasiselektiname user id pagal tai, kas yra įvesta
        $userIdData = $db->query(
            sprintf("SELECT id FROM users WHERE email='%s' AND password='%s'", $_POST['email'], md5($_POST['password']))
        );
        if ($userIdData->num_rows) {
            //sesijos key ir reikšmės priskyrimas
            $userId = $userIdData->fetch_assoc()['id'];
            $_SESSION['user_id'] = $userId;
            header('Location: ./');
            exit;
        } else {
            $message = 'Wrong data entered';
        }
    } else {
        $message = 'Not all data is entered';
    }
}
?>
<?php if ($message) : ?>
    <div class="alert alert-danger"><?= $message ?></div>
<?php endif; ?>
<h1 class="text-center">Login</h1>
<div class="d-flex justify-content-center mt-5">
    <div class="form-container">
        <form method="POST">
            <div class="mt-3">
                <label>Your email:</label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mt-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <button class="btn btn-success mt-4">Log In</button>
        </form>
    </div>
</div>