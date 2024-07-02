<?php
Session_Start();

$_SESSION ["fname"] = "Alfred";

print $_SESSION ["fname"];
?>
<br>
<a href ="page_02.php">Go to page 2</a>