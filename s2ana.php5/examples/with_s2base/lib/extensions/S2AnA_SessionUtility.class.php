<?php

/**
 * PHP session utility
 * @author yonekawa
 */
class S2AnA_SessionUtility
{
    public static function init()
    {
        if (!headers_sent() && strlen(session_id()) <= 0) {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        self::init();
        $_SESSION[$key] = $value;
        return TRUE;
    }

    public static function get($key)
    {
        self::init();
        if (array_key_exists($key, $_SESSION) === FALSE) {
            return FALSE;
        }
        return $_SESSION[$key];
    }

    public static function getSessionId()
    {
        self::init();
        $session_id = session_id();
        if (strlen( $session_id ) <= 0 ) {
            return FALSE;
        }
        return $session_id;
    }
}

?>
