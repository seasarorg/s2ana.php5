<?php

class AuthAccessOnlyClass implements CallableClass
{
    public function call()
    {
        return TRUE;
    }
}

?>