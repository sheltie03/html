<?php
  session_start();
?>
<html>
<title>XSS(2)</title>
<body>
  <h1>Sign up for XSS Vuln</h1>
  <form action="xss2_confirm.php" method="get">
    Name: <input type="text" name="name"><br/>
    Email: <input type="text" name="mail"><br/>
    <input type="submit" value="Creat an account">
    <input type="reset" value="Reset">
  </form>
</body>
<br>
<a href='../'>Back to Top Page</a>
</html>
