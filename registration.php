<?php
require_once 'class_user.php';

session_start();

try {
    $felh = new User();
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $nev = $_POST['nev'] ?? '';
    $email = $_POST['email'] ?? '';
    $jelszo = $_POST['jelszo'] ?? '';

    $register = $felh->reg_felhasznalo($nev, $email, $jelszo);

    if (!$register) {
        echo "<script>alert('Sikertelen regisztráció');</script>";
    } else {
        $login = $felh->bejelentkezes($nev, $jelszo);

        if ($login) {
            header("Location: home.php"); //küldj át ide azonnal
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regisztráció</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main>
            <h1>Regisztráció</h1>
            <form action="registration.php" method="post">
                <label>Név:</label>
                <input type="text" name="nev" value="Jane doe">
                <br>
                <label>Email:</label>
                <input type="text" name="email" value="example@email.com">
                <br>
                <label>Jelszo:</label>
                <input type="password" name="jelszo" value="pass123">
                <br>
                <input type="submit" name="login" value="Regisztráció">
                <input type="submit" name="registration" value="Belépés">
            </form>
        </main>
    </body>
</html>