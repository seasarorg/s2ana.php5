<?php
function microtime_float(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
} 
$time_start = microtime_float();

require_once(dirname(dirname(__FILE__)).'/config/environment.inc.php');
require_once(dirname(dirname(__FILE__)).'/vendor/plugins/smarty/config/environment.inc.php');
define('S2BASE_PHP5_REQUEST_MODULE_KEY','mod');
define('S2BASE_PHP5_REQUEST_ACTION_KEY','act');
define('S2BASE_PHP5_DEFAULT_MODULE_NAME','Default');
define('S2BASE_PHP5_DEFAULT_ACTION_NAME','index');
try{
    S2Base_Dispatcher::dispatch(new S2Base_RequestImpl());
}catch(S2AnA_NotAuthenticatedException $e){
    
    $request = new S2Base_RequestImpl();    
    $request->setParam(S2ANA_PHP5_REDIRECT_MODULE_KEY, 
                       $request->getParam(S2BASE_PHP5_REQUEST_MODULE_KEY));
    $request->setParam(S2ANA_PHP5_REDIRECT_ACTION_KEY, 
                       $request->getParam(S2BASE_PHP5_REQUEST_ACTION_KEY));
    
    $request->setParam('redirect', TRUE);
    
    $request->setModule(S2ANA_PHP5_LOGIN_MODULE_NAME);
    $request->setAction(S2ANA_PHP5_LOGIN_ACTION_NAME);

    S2Base_Dispatcher::dispatch($request);
    
}catch(Exception $e){
    print "<pre><font color=\"red\">{$e->__toString()}</font></pre>\n";
}

$time_end = microtime_float();
$time = $time_end - $time_start;
echo "<br> [ dispatch time : $time seconds ] <br>\n";
?>