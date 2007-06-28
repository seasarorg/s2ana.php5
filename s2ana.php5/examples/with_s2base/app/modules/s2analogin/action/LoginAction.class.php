<?php
class LoginAction
    implements S2Base_Action {
    private $loginService;

    public function execute(S2Base_Request $request,
                            S2Base_View $view){
    
        $login_id = $request->getParam('login');
        $password = $request->getParam('password');
        $redirect_module = $request->getParam(S2ANA_PHP5_REDIRECT_MODULE_KEY);
        $redirect_action = $request->getParam(S2ANA_PHP5_REDIRECT_ACTION_KEY);
        
        if ($this->loginService->login($login_id, $password)) {
            // login success
            $redirect = 'redirect:' . $module . ':' . $action;
            return $redirect;
        } else {
            // login failure
            $view->assign('warnings', $this->loginService->getWarnings());
            $view->assign('login', $login_id);
            $view->assign('password', $password);
            $view->assign('redirect_module', $redirect_module);
            $view->assign('redirect_action', $redirect_action);
        }
    }

    public function setLoginService(LoginService $service){
        $this->loginService = $service;
    }
}
?>
