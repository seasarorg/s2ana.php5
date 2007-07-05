<?php

/**
 * PHPのSessionを扱うマネージャクラス
 * @author yonekawa
 */
class S2AnA_SessionManager
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return TRUE;
    }
}

?>
