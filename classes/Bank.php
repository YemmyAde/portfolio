<?php
class Bank
{
    public static function addBank($data)
    {
        global $DB;
        $keys_array = array();
        $values_array = array();
        foreach ($data as $key => $value) {
            $values_array[] = str_replace("'", "\'", $value);
            $keys_array[] = $key;
        }
        $sql = "INSERT INTO banks (" . implode(',', $keys_array) . ") VALUE('" . implode("','", $values_array) . "')";
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
    public static function getInfoByUserID($id)
    {
        global $DB;
        $sql = "SELECT * FROM banks INNER JOIN users ON banks.user_id=users.id WHERE banks.user_id = :user_id ";
        //echo $sql;
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([
                'user_id' => $id
            ]);
            $row = $stmt->fetchAll();
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