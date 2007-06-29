<?php

/**
 * 暗号化ユーティリティ
 *
 * @author yonekawa
 */
class S2AnA_EncryptionUtility
{
    /**
     * @param  string 平文文字列
     * @param  string 暗号化に使うsalt
     * @return string 暗号化された文字列
     */
    public static function encrypt($string, $salt = NULL)
    {
        // encrypt...
        $encrypt_string = $string;
        return $encrypt_string;
    }
    
    public static function hashed($string)
    {
        // hashed...
        $hashed_string = $string;
        return $hashed_string;
    }
    
    public static function salted($hashed_string, $salt)
    {
        
    }
}

?>
