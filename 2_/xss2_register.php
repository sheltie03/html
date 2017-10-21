<?php
  session_start();
?>
<html>
<title>XSS(2)</title>
<body>
  <h1>Successfully Registered</h1>
  Automatically jumped to top page so please wait 3 seconds
</body>
<script>
function jumpPage() {
  location.href = "../";
}
setTimeout("jumpPage()",3000)
</script>
</html>
