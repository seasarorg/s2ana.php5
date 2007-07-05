<?php

/**
 * 暗号化ユーティリティ
 *
 * @author yonekawa
 */
class S2AnA_PasswordEncoder
{
    private $algorithm;
    private $key;
    
    public function __construct($algorithm)
    {
        $this->algorithm = $algorithm;
    }
    
    // コンストラクタでアルゴリズム指定
    // 文字列とsaltをマージ(単純に連結しているだけ。saltは{}で囲まれているものとするらしいが、第三引数で変えられる)
    // アルゴリズムでdigest
    public function encodeP($string, $salt)
    {
        // hashed...
        $hashed_string = substr(hash_hmac(self::ALGORITHM, $string, self::KEY), 0, 40);
        return $hashed_string;
    }
    
}

?>
