<?php
    session_start();
    require_once 'class_user.php';
    try {
		$felh = new User();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
    if (isset($_POST['submit'])) {
    $emailVagyNev = $_POST['emailVagyNev'] ?? '';
    $jelszo = $_POST['jelszo'] ?? '';
        $login = $felh->bejelentkezes($emailVagyNev, $jelszo);
        if ($login) {
        // sikeres bejelentkezés
			header("location:home.php");
			exit;
        } else {
             // sikertelen
			$uzenet = "Hibás felhasználónév vagy jelszó!";
            echo "<script>alert(" . json_encode($uzenet) . ");</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bejelentkezés</title>
        <link rel="stylesheet" href="style.css">
        <script src="login.js"></script>
    </head>
    <body>
        <main>
		    <h1>Bejelentkezés</h1>
                <form action="login.php" method="post">
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
