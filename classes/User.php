<?php
class User {
    public static function addUser( $data ) {
        global $DB;
        $keys_array = array();
        $values_array = array();
        foreach ($data as $key => $value) {
            $values_array[] = str_replace("'", "\'", $value);
            $keys_array[] = $key;
        }
        $sql = "INSERT INTO user (" . implode(',', $keys_array) . ") VALUE('" . implode("','", $values_array) . "')";
        /*echo $sql;
        die();*/
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([]);
            return $DB->lastInsertId();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public static function getUserByEmail($email)
    {
        global $DB;
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([
                'email' => $email
            ]);
            $row = $stmt->fetch();
            if(!$row){
                return false;
            }else{
                return true;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public static function verifyUser($email = "",$password = "")
    {
        global $DB;
        $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([
                'email'     => $email,
                'password'  => $password,
            ]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$row){
                return false;
            }else{
                return $row;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}