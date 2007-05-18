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
 *
 * S2AnA System Definition
 *   S2AnA define these definitions.
 *   - S2ANA_PHP5 : S2AnA.PHP5 ROOT Directory
 *      [ string default /src/s2ana.php5 ]
 * 
 * Autoload function must be defined
 *   sample : use S2ContainerClassLoader
 *     S2ContainerClassLoader::import(S2CONTAINER_PHP5);
 *     S2ContainerClassLoader::import(S2ANA_PHP5);
 *     function __autoload($class = null){
 *         S2ContainerClassLoader::load($class);
 *     }
 * 
 *   sample : use include_once directly
 *     function __autoload($class=null){
 *         if($class != null){
 *             include_once("$class.class.php");
 *         }
 *     }
 * 
 */
 
/**
 * S2AnA.PHP5 ROOT Directory
 */
define('S2ANA_PHP5', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'S2AnA');
ini_set('include_path', 
        S2ANA_PHP5 . PATH_SEPARATOR . ini_get('include_path'));

/**
 * S2AnA.PHP5 Core Classes
 */
//require_once 's2ana.core.classes.php';
//if(class_exists('S2ContainerClassLoader')){
//    S2ContainerClassLoader::import(S2ANA_PHP5);
//}

/**
 * Messages Resouce File
 */
if(class_exists('S2ContainerMessageUtil')){
    S2ContainerMessageUtil::addMessageResource(S2ANA_PHP5 . '/AnAMessages.properties');
}
?>