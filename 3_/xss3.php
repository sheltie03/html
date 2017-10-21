<?php
   session_start();
   $url = $_POST['url'];
   function h($str) {
   return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
   }
?>

<html>
<title>XSS(3)</title>
<body>
  <h1>Mini Browser</h1>

  <h3>URL Submit Form</h3>
  <form action="" method="post" accept-charset="utf-8">
    <input type="text" name="url" value=""><input type="submit" value="Submit">
  </form>

  <h3>Example</h3>
  <ul>
    <li>http://ftp.kddilabs.jp/
    <li>...
  </ul>

  <h4>Submitted URL: <?php echo h($_POST['url']); ?></h4>

  <?php
     $link = $_POST['url'];
     if (empty($link)) {
     $link = "./404.txt";
     }
     ?>


  <h3>Mini Browsing</h3>
  <ul>
    <li><a href="../" target="target_box">Top Page View</a></li>
    <li><a href="https://ftp.jaist.ac.jp/" target="target_box">FTP JAIST</a></li>
    <li><a href=<?php echo $link; ?> target="target_box"><b>My Submitted URL</b></a></li>
  </ul>

  <iframe width="600px" height="300px" name="target_box"></iframe>
</body>
<br>
<a href='../'>Back to Top Page</a>
</html>
