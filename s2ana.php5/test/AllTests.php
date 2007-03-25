<?php

require_once dirname(__FILE__) . "/test.environment.php";
require_once dirname(__FILE__) . "/AuthenticationAllTests.php";
require_once dirname(__FILE__) . "/AuthorizationAllTests.php";

class AllTests
{
    public function __construct(){}

    public static function main()
    {
        PHPUnit2_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suites = new PHPUnit2_Framework_TestSuite(__CLASS__ . " Tests");
        $suites->addTestSuite(AuthenticationAllTests::suite());
        $suites->addTestSuite(AuthorizationAllTests::suite());
        return $suites;
    }
}

?>
