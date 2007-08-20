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
 * @author yonekawa
 */
class S2AnA_RequestUtility
{
    const GET =  'GET';
    const POST = 'POST';

    public static function isPost()
    {
        if (array_key_exists( 'REQUEST_METHOD', $_SERVER ) 
            || $_SERVER['REQUEST_METHOD'] !== self::POST )
        {
            return FALSE;
        }
        return TRUE;
    }

    public static function isGet()
    {
        if (array_key_exists( 'REQUEST_METHOD', $_SERVER )
            || $_SERVER['REQUEST_METHOD'] !== self::GET )
        {
            return FALSE;
        }
        return TRUE;
    }
}

?>