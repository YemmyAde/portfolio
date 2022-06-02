<?php
class Transactions {
    public static function addTransaction($data ) {
        global $DB;
        $keys_array = array();
        $values_array = array();
        foreach ($data as $key => $value) {
            $values_array[] = str_replace("'", "\'", $value);
            $keys_array[] = $key;
        }
        $sql = "INSERT INTO transactions (" . implode(',', $keys_array) . ") VALUE('" . implode("','", $values_array) . "')";
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
    public static function get($data){
        global $DB;
        $sql = "SELECT * FROM transactions WHERE 1";
        if($data['id']!=''){
            $sql .=" AND user_id = '".$data['id']."'";
        }
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([]);
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