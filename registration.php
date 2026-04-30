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
            header("Location: home.php");
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
            <form>
            </form>
        </main>
    </body>
</html>