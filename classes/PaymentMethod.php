<?php
class PaymentMethod
{
    public static function get(){
        global $DB;
        $sql = "SELECT * FROM ceda_payment_methods WHERE is_active = 1";
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