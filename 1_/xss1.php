<html>
<title>XSS(1)</title>
<h1>Value Submit</h1>
<body>
    <form action="" method="post" accept-charset="utf-8">
        <input type="text" name="param" value=""><input type="submit" value="Submit">
    </form>
    <b>Submitted Value:</b> <?php echo $_POST['param']; ?>
</body>

<br>
<br>
<a href='../'>Back to Top Page</a>
</html>
