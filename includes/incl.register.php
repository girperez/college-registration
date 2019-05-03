<?php

class Register extends Database{

    public function reg($user, $pass, $fn, $ln, $phone, $email){
        try {
            $confirm = False;
            if(empty($user) || empty($pass) || empty($fn) || empty($ln) || empty($phone) || empty($email)){
                throw new Exception("the forms are not yet completed");
            }
            else{
                $stmt=$this->connect()->prepare("INSERT INTO student(Username, First_name, Last_name, Phone_num, Email)
                VALUES(?,?,?,?,?)");
                $stmt->execute([$user, $fn, $ln, $phone, $email]);

                $stmt=$this->connect()->prepare("INSERT INTO accounts(Type, Username, Pass)
                VALUES(?,?,?)");
                $type = "Student";
                $stmt->execute([$type, $user, $pass]);
                $confirm= True;
                return $confirm;
            }
        } catch (Exception $th) {
            echo "<script>alert('".$th->getMessage()."');</script>";
        }

    }

    public function validateAccount($user){
        $stmt=$this->connect()->prepare("SELECT Username From accounts where Username = ?");
        $stmt->execute([$user]);
        if($stmt->rowCount()>0){
            return TRUE;
        }
        return FALSE;
    }
}