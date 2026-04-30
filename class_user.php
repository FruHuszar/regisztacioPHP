<?php
class User {
    private $host = "localhost";
    private $felhasznalo = "root";
    private $jelszo = "";
    private $adatbazis = "pizzahot";
    private $kapcsolat;

    public function __construct() {
        try {
            $this->kapcsolat = new mysqli(
                $this->host,
                $this->felhasznalo,
                $this->jelszo,
                $this->adatbazis,
            ); 

            $this->kapcsolat->set_charset("utf8mb4");

        } catch (mysqli_sql_exception $e) {
            throw new Exception(
                "Adatbázis kapcsolódási hiba: " . $e->getMessage(),
                $e->getCode()
            );
        }
    }

    public function reg_felhasznalo($nev, $email, $jelszo) {
        $jelszo = md5($jelszo);

        //ha nem regisztrált, létrehozzuk user jog-gal
        if (true) { //num_row valami  true helyett
            $stmt = $this->kapcsolat->prepare("SQL INSERT");
            $stmt->bind_param("sss", $nev, $email, $jelszo);
            return $stmt->execute();
        } else { 
            return false;
        }
    }

    public function bejelentkezes($emailNev, $jelszo) {
        $titkosJelszo = md5($jelszo);
        $sql = "";
        
        if (isset($result)) { 
            $_SESSION['login'] = true;
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            $felhAzon = $user_data['felhAzon'];
            $_SESSION['felhAzon'] = $felhAzon;
            
            $sql = "";
            return true;
        } else {
            return false;
        }
    }

    /* név lekérése */
    public function get_nev($felhAzon) {
        $sql = "SELECT nev FROM felhasznalo WHERE felhAzon = $felhAzon";
        $result = null; // Helyőrző, hogy a ->fetch ne dobjon hibát
        if ($result) {
            $user_data = $result->fetch_array(MYSQLI_ASSOC);
            echo $user_data['nev'];
        }
    }

    public function isAdmin($felhAzon) {
        $sql = "SELECT ...";
        $result = 0; 
        if ($result == 1) {
            return true;
        }
        return false;
    }

    /*** be van-e jelentkezve ***/
    public function get_session() {
        return $_SESSION['login'] ?? false;
    }

    public function kijelentkezes() {
        $felhAzon = $_SESSION['felhAzon'] ?? null;
        $sql = "..."; //bejelentkezett mező 0-ra állítása
        $result = null;

        $_SESSION = [];
        session_destroy();
    }

    public function aktivok() {
        $sql = "..."; //select where feltétellel
        return null; // mátrix visszaadása
    }

    public function megjelenit_aktivok($matrix) {
        // mátrix megjelenítése
    }
}
?>