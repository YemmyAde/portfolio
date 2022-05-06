<?php
class KycVerification
{
    public static function addKyc($data)
    {
        global $DB;
        $keys_array = array();
        $values_array = array();
        foreach ($data as $key => $value) {
            $values_array[] = str_replace("'", "\'", $value);
            $keys_array[] = $key;
        }
        $sql = "INSERT INTO kyc_verification (" . implode(',', $keys_array) . ") VALUE('" . implode("','", $values_array) . "')";
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
        $sql = "SELECT * FROM kyc_verification INNER JOIN user ON kyc_verification.user_id=user.id WHERE kyc_verification.user_id = :user_id ";
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([
                'user_id' => $id
            ]);
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