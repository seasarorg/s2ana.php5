<?php
class IndexAction
    implements S2Base_Action {
    private $loginService;

    public function execute(S2Base_Request $request,
                            S2Base_View $view)
    {
        $redirect_module = $request->getParam(S2ANA_PHP5_REDIRECT_MODULE_KEY);
        $redirect_action = $request->getParam(S2ANA_PHP5_REDIRECT_ACTION_KEY);
        
        $view->assign('redirect_module', $redirect_module);
        $view->assign('redirect_action', $redirect_action);
        
        // login module setting
        $view->assign('login_module', S2ANA_PHP5_LOGIN_MODULE_NAME);
        $view->assign('login_action', S2ANA_PHP5_LOGIN_ACTION_NAME);
        $view->assign('signup', S2ANA_PHP5_SIGNUP_ACTION_NAME);
        $view->assign('forgot_password_action', S2ANA_PHP5_FORGOT_PASSWORD_ACTION_NAME);
    }

}
?>
