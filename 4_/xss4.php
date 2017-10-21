<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XSS(4)</title>
</head>
<body>
  <h1>Select and Upload a Picture</h1>
  <form action="xss4.php" method="post" enctype="multipart/form-data">
    <input type="submit" value="upload" />
    <input type="file" name="upfile" size="30" />
  </form>
  <h2>Rename an Uploaded Picture</h2>
  <form action="xss4.php" method="get">
    Old Name: <input type="text" name="oldName"><br/>
    New Name: <input type="text" name="newName"><br/>
    <input type="submit" value="Rename">
    <input type="reset" value="Reset">
  </form>

  <p><?php
	function h($str) {
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}
	$newName = $_GET['newName'];
	$oldName = $_GET['oldName'];
	if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
	if (move_uploaded_file($_FILES["upfile"]["tmp_name"], "./files/" . $_FILES["upfile"]["name"])) {
	chmod("files/" . $_FILES["upfile"]["name"], 0644);
	echo $_FILES["upfile"]["name"] . " is successfully uploaded";
	} else {
	echo "Error: a file cannot upload";
	}
	} else {
	if (empty($newName)) {
	echo "A file is not selected ...";
	}
	}
	if (!empty($newName)) {
	system("mv " . "./files/" . $oldName . " ./files/" . $newName, $ret);
	// Var Debug Dump
	//var_dump($ret);
	nl2br("\n");
	echo h($oldName) . " ---> " . $newName;
	}
	?></p>
</body>
<a href='../'>Back to Top</a>
</html>
