<?php
class S2AnA_LoginModuleCommand
    extends ModuleCommand {
    
    protected $actionClassName;

    public function getName(){
        return "[s2ana] login module";
    }

    public function execute(){
        try{
            $this->moduleName = S2Base_StdinManager::getValue('login module name ? [' . S2ANA_PHP5_LOGIN_MODULE_NAME. '] : ');
            try {
                $this->validate($this->moduleName);
            } catch (Exception $e) {
                $this->moduleName = S2ANA_PHP5_LOGIN_MODULE_NAME;
            }
            echo $this->moduleName;
            $this->srcDirectory = S2BASE_PHP5_MODULES_DIR . $this->moduleName;
            $this->testDirectory = S2BASE_PHP5_TEST_MODULES_DIR . $this->moduleName;
            
            try {
                $this->actionClassName = S2Base_StdinManager::getValue('login action name ? [' . S2ANA_PHP5_LOGIN_ACTION_NAME. ']:');
                $this->validate($this->actionClassName);
            } catch (Exception $e) {
                $this->actionClassName = S2ANA_PHP5_LOGIN_ACTION_NAME;
            }
            
            if (!$this->finalConfirm()){
                return;
            }
            $this->createDirectory();
            $this->prepareFiles();
            $this->prepareActionFile();
        } catch(Exception $e) {
            S2Base_CommandUtil::showException($e);
            return;
        }
    }
    
    protected function finalConfirm(){
        print PHP_EOL . '[ generate information ]' . PHP_EOL;
        print "  module name : {$this->moduleName}" . PHP_EOL;
        print "  action name : {$this->actionClassName}" . PHP_EOL;
        return S2Base_StdinManager::isYes('confirm ?');
    }
    
    protected function prepareActionFile(){
        $srcFile = S2BASE_PHP5_MODULES_DIR
                 . $this->moduleName
                 . S2BASE_PHP5_ACTION_DIR
                 . $this->actionClassName
                 . S2BASE_PHP5_CLASS_SUFFIX;
        $tempContent = S2Base_CommandUtil::readFile(S2BASE_PHP5_PLUGIN_SMARTY
                     . '/skeleton/login/action.php');
        $tempContent = preg_replace("/@@CLASS_NAME@@/",
                             $this->actionClassName,
                             $tempContent);   
        S2Base_CommandUtil::writeFile($srcFile,$tempContent);
    }
}
?>
