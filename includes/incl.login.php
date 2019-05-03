<?php
class Login extends Database{

    public function Sign_in($user, $pass){

        $stmt=$this->connect()->prepare("SELECT Type, Username FROM accounts WHERE Username = ? AND Pass = ?");
        $stmt->execute([$user, $pass]);
        if($stmt->rowCount()>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $row['Username'];
            $_SESSION['type'] = $row['Type'];
            return TRUE;
        }
        return FALSE;
    }

    public function reLogin($user, $pass){
        $stmt=$this->connect()->prepare("SELECT Type, Username FROM accounts WHERE Username = ? AND Pass = ?");
        $stmt->execute([$user, $pass]);
        if($stmt->rowCount()>0){
            return TRUE;
        }
        return FALSE;
    }

    public function Sign_out(){
        if(isset($_SESSION['username'])){
            $_SESSION = array();
            session_destroy();
        }
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
        header('Location: ' . $home_url);
    }
}