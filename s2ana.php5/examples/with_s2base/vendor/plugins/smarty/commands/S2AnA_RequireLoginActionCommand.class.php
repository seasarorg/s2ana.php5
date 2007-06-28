<?php
class S2AnA_RequireLoginActionCommand
    extends ActionCommand {

    public function getName(){
        return "[s2ana] require login action";
    }

    protected function prepareDiconFile(){
        $srcFile = S2BASE_PHP5_MODULES_DIR
                 . $this->moduleName
                 . S2BASE_PHP5_DICON_DIR
                 . $this->actionClassName
                 . S2BASE_PHP5_DICON_SUFFIX;
        $tempContent = S2Base_CommandUtil::readFile(S2BASE_PHP5_PLUGIN_SMARTY
                     . '/skeleton/action/requireLoginDicon.php');
        $patterns = array("/@@MODULE_NAME@@/","/@@COMPONENT_NAME@@/","/@@CLASS_NAME@@/");
        $replacements = array($this->moduleName,$this->actionName,$this->actionClassName);
        $tempContent = preg_replace($patterns,$replacements,$tempContent);
        S2Base_CommandUtil::writeFile($srcFile,$tempContent);
    }

}
?>
