<?php
$message = false;
//validacija, ar yra metodas POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //validacija, ar įvesti visi duomenys
    if (
        isset($_POST['email']) and
        isset($_POST['username']) and
        isset($_POST['password']) and
        strlen($_POST['email']) > 0 and
        strlen($_POST['username']) > 0 and
        strlen($_POST['password']) > 0
    ) {
        //validacija ar egzistuoja jau toks useris/email
        try {
            $db->query(
                sprintf(
                    "INSERT INTO users (email, username, password) VALUES ('%s', '%s', '%s')",
                    $_POST['email'],
                    $_POST['username'],
                    md5($_POST['password'])
                )
            );
            header('Location: ./');
            exit;
        } catch (Exception $error) {
            $message = 'This username or email already exists';
        }
    } else {
        $message = 'Not all data is entered';
    }
}
?>
<!-- registracijos įspėjimas -->
<?php if ($message) : ?>
    <div class="alert alert-danger"><?= $message ?></div>
<?php endif; ?>
<h1 class="text-center">Registration</h1>
<div class="d-flex justify-content-center mt-5">
    <div class="form-container">
        <form method="POST">
            <div class="mt-3">
                <label>Your email:</label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mt-3">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Create username (max 20 symbols)">
            </div>
            <div class="mt-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Create password (max 30 symbols)">
            </div>
            <button class="btn btn-success mt-4">Register</button>
        </form>
    </div>
</div>