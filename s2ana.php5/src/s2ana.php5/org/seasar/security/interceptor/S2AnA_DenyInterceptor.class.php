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
 * 指定されたロールによるアクセスを拒否するInterceptor
 * @author yonekawa
 */
class S2AnA_DenyInterceptor extends S2AnA_AbstractAuthorizationInterceptor
{
    public function __construct($roleName)
    {
        $argc = func_num_args();
        for ($i = 0; $i < $argc; $i++) {
            $this->addRoleName(func_get_arg($i));
        }
    }

    protected function ifInRole(S2Container_MethodInvocation $invocation,
                                S2AnA_AuthenticationContext $context,
                                $roleName) 
    {
        throw new S2AnA_AccessDeniedException($invocation->getThis(), $context, $roleName);
    }
    protected function ifNotInRole(S2Container_MethodInvocation $invocation,
                                   S2AnA_AuthenticationContext $context )
    {
        return $invocation->proceed();
    }
}

?>