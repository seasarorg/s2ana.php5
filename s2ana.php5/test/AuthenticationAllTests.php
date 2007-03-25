<?php

require_once dirname(__FILE__) . "/test.environment.php";

/**
 * Test class for AuthenticationAllTests.
 */
class AuthenticationAllTests
{

    public function __construct()
    {
    }

    public static function main()
    {
        PHPUnit2_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit2_Framework_TestSuite(__CLASS__ . " Tests");
        $suite->addTestSuite('S2AnA_AuthenticationContextResolverImplTest');
        $suite->addTestSuite('S2AnA_NullAuthenticationContextTest');
        return $suite;
    }
}

?>
