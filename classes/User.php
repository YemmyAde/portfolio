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
        //echo $sql;
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([]);
            return $DB->lastInsertId();
        } catch (Exception $e) {
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
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}