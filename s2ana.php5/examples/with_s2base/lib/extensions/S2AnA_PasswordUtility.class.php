<?php

/**
 * パスワードに関するユーティリティクラスです
 *
 * @author yonekawa
 */
class S2AnA_PasswordUtility
{
    /**
     * @param  string 平文パスワード
     * @param  string 暗号化に使うsalt
     * @return string 暗号化されたパスワード
     */
    public static function encrypt($password, $salt)
    {
        // encrypt...
        $encrypt_password = $password;
        return $encrypt_password;
    }
}

?>
