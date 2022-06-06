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
    public static function updateTransaction( $data ) {
        global $DB;
        $fields = array();

        foreach ($data as $key => $value) {
            if ($key=='token') {
                continue;
            }

            $fields[] = $key ."='".str_replace("'", "\'", $value)."'";
        }
        $sql  = "UPDATE transactions SET ".implode(',', $fields)." WHERE id = '".$data['id']."'";
        //echo $sql;
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([]);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
    public static function get($data){
        global $DB;
        $sql = "SELECT * FROM transactions WHERE 1";
        if($data['id']!=''){
            $sql .=" AND user_id = '".$data['id']."'";
        }
       // echo $sql;
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
    public static function getTotalTransactions($data){
        global $DB;
        $sql = "SELECT SUM(amount_to) as total FROM transactions WHERE 1";
        if($data['id']!=''){
            $sql .=" AND user_id = '".$data['id']."'";
        }
       // echo $sql;
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([]);
            $row = $stmt->fetch();
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