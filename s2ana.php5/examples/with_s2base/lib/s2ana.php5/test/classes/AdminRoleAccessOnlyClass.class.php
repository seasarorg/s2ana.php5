<?php

class AdminRoleAccessOnlyClass implements CallableClass
{
    public function call()
    {
        return TRUE;
    }
}

?>