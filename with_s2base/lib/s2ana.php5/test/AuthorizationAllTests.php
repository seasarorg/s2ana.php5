<?php

require_once dirname(__FILE__) . "/test.environment.php";
S2ContainerClassLoader::import(S2ANA_PHP5_TEST_AUTHORIZATION);

/**
 * Test class for AuthorizationAllTests.
 */
class AuthorizationAllTests
{
    public function __construct(){}

    public static function main()
    {
        PHPUnit2_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit2_Framework_TestSuite(__CLASS__ . " Tests");
        $suite->addTestSuite('S2AnA_AccessDeniedExceptionTest');
        $suite->addTestSuite('S2AnA_AllowInterceptorTest');
        $suite->addTestSuite('S2AnA_AuthenticatedAccessOnlyInterceptorTest');
        $suite->addTestSuite('S2AnA_DenyInterceptorTest');
        $suite->addTestSuite('S2AnA_NotAuthenticatedExceptionTest');
        return $suite;
    }
}

?>
