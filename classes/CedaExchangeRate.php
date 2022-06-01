<?php
class CedaExchangeRate {
    public static function getUserByUserISO($iso){
        global $DB;
        $sql = "SELECT * FROM ceda_exchange_rate INNER JOIN from_currency_details ON ceda_exchange_rate.currency_from = from_currency_details.id
                WHERE ceda_exchange_rate.currency_to_iso = :currency_to_country";
        $stmt = $DB->prepare($sql);
        try {
            $stmt->execute([
                'currency_to_country' => $iso
            ]);
            return $stmt->fetchAll();
        }catch (Exception $e){
            return false;
        }
    }
}