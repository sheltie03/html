<?php
  session_start();
  $name = $_GET['name'];
  $mail = $_GET['mail'];
  function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  }
?>
<html>
<title>XSS(2)</title>
<body>
  <h1>Welcome to XSS Vuln Page: <?php echo h($name); ?></h1>
  <form action="xss2_register.php" method="get">
    Name: <?php echo h($name); ?><br/>
    Email: <?php echo $mail; ?><br/>
    <input type="hidden" name="name" value="<?php echo h($name); ?>">
    <input type="hidden" name="url" value="<?php echo $mail; ?>">
    <input type="submit" value="Continue">
    <input type="button" value="Back" onclick="javascript:history.back();">
  </form>
</body>
<br>
<a href='../'>Back to Top Page</a>
</html>
