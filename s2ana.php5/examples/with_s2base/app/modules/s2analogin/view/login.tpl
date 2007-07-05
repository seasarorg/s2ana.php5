<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>s2analogin</title>
</head>
<body>

<div title="S2AnA::login" class="form">
  <h3>Please Login</h3>
  <div id="warnings">
  {foreach from=$warnings item=message}
      <li>{$message}</li>
  {/foreach}
  </div>
  
  <div class="form-padding">
      <form action="d.php" method="post" accept-charset="utf-8">
        <input type="hidden" name="mod" value="{$login_module|escape}" id="module">
        <input type="hidden" name="act" value="{$login_action|escape}" id="action">
        <input type="hidden" name="redirect_module" value="{$redirect_module}" id="redirect_module">
        <input type="hidden" name="redirect_action" value="{$redirect_action}" id="redirect_action">    
        <table>
            <tr>
                <td>Login ID</td>
                <td><input type="text" name="login" size="30" value="{$login|escape}"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" size="30"/></td>
            </tr>
            <tr>
                {if $remember_me === TRUE}{assign var=checked value="checked"}{/if}
                <td colspan="2">
                    <input type="checkbox" name="remember_me" value="1" $checked/>Remember me
                </td>
            </tr>
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
