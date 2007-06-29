<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
<title>s2analogin</title>
</head>
<body>

<div title="S2AnA::login" class="form">
  <h3>Please Login</h3>

  <div class="form-padding">
      <form action="d.php" method="post" accept-charset="utf-8">
        <table>
            <input type="hidden" name="mod" value="{$login_module|escape}" id="module">
            <input type="hidden" name="act" value="{$login_action|escape}" id="action">
            <input type="hidden" name="redirect_module" value="{$redirect_module}" id="redirect_module">
            <input type="hidden" name="redirect_action" value="{$redirect_action}" id="redirect_action">
            Login　ID <input type="text" name="login" size="30" value="{$login|escape}"/><br/>
            Password <input type="password" name="password" size="30"/><br/>
        </table>

        <div class="button-bar">
            <input type="submit" value="Login"/>
            <a href="d.php?mod={$login_module|escape}&act={$signup_action|escape}">Register for an account</a> |
            <a href="d.php?mod={$login_module|escape}&act={$forgot_password_action|escape}">Forgot my password</a>
        </div>
    </form>
  </div>
</div>

</body>
</html>
