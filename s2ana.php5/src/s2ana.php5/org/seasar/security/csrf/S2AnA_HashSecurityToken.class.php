<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
// +----------------------------------------------------------------------+
// | PHP version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright 2005-2007 the Seasar Foundation and the Others.            |
// +----------------------------------------------------------------------+
// | Licensed under the Apache License, Version 2.0 (the "License");      |
// | you may not use this file except in compliance with the License.     |
// | You may obtain a copy of the License at                              |
// |                                                                      |
// |     http://www.apache.org/licenses/LICENSE-2.0                       |
// |                                                                      |
// | Unless required by applicable law or agreed to in writing, software  |
// | distributed under the License is distributed on an "AS IS" BASIS,    |
// | WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND,                        |
// | either express or implied. See the License for the specific language |
// | governing permissions and limitations under the License.             |
// +----------------------------------------------------------------------+
// | Authors: yonekawa                                                    |
// +----------------------------------------------------------------------+
// $Id$
//
/**
 * "session ID ハッシュ化方式" のセキュリティトークンクラス
 * @author yonekawa
 */
class S2AnA_HashSecurityToken implements S2AnA_SecurityToken
{
    private $hashKey = 's2ana_php5_key';
    private $tokenName = 'security_token';

    /**
     * 現在のセキュリティトークンを取得する
     * セキュリティトークンはHMAC(sha1)でハッシュ化されたsession ID
     */
    public static function getSecurityToken()
    {
        if (!headers_sent() && session_id() == '') {
            session_start();
        }
        $session_id = session_id();
        if ($session_id === FALSE) {
            return FALSE;
        }

        $token = hash_hmac('sha1', $session_id, $this->hashKey);
        return $token;
    }

    /**
     * 渡されたクライアントのトークンとセキュリティトークンを比較して正しいトークンかどうかを返す
     * @param string $token リクエストから受け取ったクライアントのトークン
     * @return boolean 正しいセキュリティトークンか
     */
    public function validate($token)
    {
        if (is_null($token) || strlen(trim($token)) <= 0)
            return FALSE;

        $security_token = $this->getSecurityToken();
        if ($security_token === FALSE)
            return FALSE;

        if (strcasecmp($postToken, $security_token) !== 0)
            return FALSE;

        return TRUE;
    }

    public function setHashKey($key)
    {
        $this->hashKey = $key;
    }
    public function getHashKey()
    {
        return $this->hashKey;
    }
    public function setTokenName($tokenName)
    {
        $this->tokenName = $tokenName;
    }
    public function getTokenName()
    {
        return $this->tokenName;
    }
}

?>
