<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE components PUBLIC "-//SEASAR//DTD S2Container//EN"
"http://www.seasar.org/dtd/components21.dtd">
<components>
    <include path="%S2BASE_PHP5_ROOT%/app/commons/dicon/ana.dicon" />
    <!-- 
    <include path="%S2BASE_PHP5_ROOT%/app/modules/@@MODULE_NAME@@/dicon/service.dicon"/>
    -->

    <component name="@@COMPONENT_NAME@@" class="@@CLASS_NAME@@">
        <aspect>requireLogin</aspect>
    </component>
</components>
