<?php
  error_reporting  (E_ALL);
  ini_set ('display_errors', true);
  $mysql_host = "mysql14.000webhost.com";
	$mysql_database = "a3696617_web";
	$mysql_user = "a3696617_root";
	$mysql_password = "mecham12";
	mysql_connect($mysql_host , $mysql_user, $mysql_password ) or die(mysql_error());
	mysql_select_db($mysql_database)  or die(mysql_error());
  $baseText="\"";
  $text=$_POST['text'];
  $text=htmlspecialchars($text);
  $text=mysql_real_escape_string($text);
  $bool=true;
  if(count($text)>490){
    $text=substr($text,0,490);
    $bool=false;
  }
  $text=str_replace("\r\n","<br>",$text);
  $text=str_replace("\\r\\n","<br>",$text);
  $text=str_replace("\n","<br>",$text);
  $text=str_replace("\\n","<br>",$text);
  $text=str_replace("\\r","<br>",$text);
  $text=str_replace("\r","<br>",$text);
  $baseText.=$text;
  $baseText.="\"";
  
  $id=$_POST['id'];
  $id=htmlspecialchars($id);
  $id=mysql_real_escape_string($id);
  
  $query="INSERT INTO comments(comment,post_id) VALUES (".$baseText.",".$id.");";
  $rsult=mysql_query($query) or die(mysql_error());
  





?>




<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>City Search</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<style type="text/css"> 
    #list2 { height: auto !important;
	     height: 100%;
	     background: repeat-y white; 
	    }
	
    
    </style>
</head>

<body>
	<div id="header">
		
	  <div id="navigation">
			<ul>
			      
				<li><a href="index.html">Home</a></li>
				<li><a href="index.html">About us</a></li>
				<li><a href="index.html">Support</a></li>
				<li><a href="index.html">Forum</a></li>
				<li><a href="index.html">Contact</a></li>
			</ul>
		</div>
		<div id="search">
			<form action="search.php" method="GET">
				<input type="text" name="CitySearch" value="Find City" class="txtfield" onblur="javascript:if(this.value==''){this.value=this.defaultValue;}" onfocus="javascript:if(this.value==this.defaultValue){this.value='';}" />
				<input type="submit" value="Search" class="button" />
			</form>
		</div>
	</div> <!-- /#header -->
	<div id="contents">
	  <br>
	  <br>
	  <center>
	  <?php
	    if($rsult==1){
	      echo "<p>Comment Successful!</p>";
	    }else{
	      echo "<p>Comment FAILED!!</p>";
	    }
	    
	    echo "<a href=\"searchResult.php?id=".$id."\"> Return to page! </a> <br>";
	    
	  ?>
	  </center>
    </div> 
	
	<div id="footer">

		
		
	</div> <!-- /#footer -->
</body>
</html>