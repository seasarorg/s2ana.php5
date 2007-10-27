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
// | Authors: yonekawa                                                       |
// +----------------------------------------------------------------------+
// $Id$
//
/**
 * security_token tag
 * <input type="hidden" name=$tokenParamName value={getSecurityToken} />
 * token is hash(sha1 hmac) of session_id
 * @author yonekawa
 */
class S2AnA_OneTimeSecurityToken implements S2AnA_SecurityToken
{
    private $tokenName = 'security_token';

    public function getSecurityToken()
    {
        session_start();
        $session_id = session_id();
        if ($session_id === FALSE) {
            return FALSE;
        }
        $token = hash_hmac('sha1', $session_id, $salt);
        return $token;
    }
    public function validate()
    {
        if (array_key_exists($this->tokenName, $_POST)
            || strlen( $_POST[$this->tokenName] ) <= 0)
        {
            return FALSE;
        }
        $postToken = $_POST[$this->tokenName];

        $security_token = $this->getSecurityToken();
        if ($security_token === FALSE) {
            return FALSE;
        }

        // validate token.
        if (strcasecmp($postToken, $security_token) !== 0) {
            return FALSE
        }
        return TRUE;
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