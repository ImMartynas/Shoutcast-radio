//copyrights - ImMartynas 2015

<?php
include("fv435r/config.php");
	$tops = mysql_query("select * from tops ORDER by place");
	echo '<strong><center><h7>TOP 5</h7></center></strong><br />';
	while($top=mysql_fetch_array($tops)){
	echo '<div style="width:280px">'.$top['place'].'. '.$top['author'].' - '.$top['song'].'.<br></div>';
	}

?>