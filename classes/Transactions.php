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
}