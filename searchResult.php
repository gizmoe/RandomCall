<?php
global $raw_results;

$city;
$comments;

error_reporting  (E_ALL);

ini_set ('display_errors', true);

$mysql_host = "mysql14.000webhost.com";
$mysql_database = "a3696617_web";
$mysql_user = "a3696617_root";
$mysql_password = "mecham12";
mysql_connect($mysql_host , $mysql_user, $mysql_password ) or die(mysql_error());
mysql_select_db($mysql_database)  or die(mysql_error());

$text=$_GET['id'];
$text=htmlspecialchars($text);

$text=mysql_real_escape_string($text);
$query="Select * From Cities Where id=".$text;
$raw_results=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($raw_results)==1){
  $city= mysql_fetch_array($raw_results);
  $comments=mysql_query("Select * From comments Where post_id=".$text);
}else{
  echo "EROROROROROROOROR";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>City Search</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" charset="utf-8" />	
	<![endif]-->
    
    <style>
   * { margin: 0; padding: 0; }
   body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 62.5%; }
   p { margin: 1em 0; }
   #wrap {
      width: 500px;
      font-size: 1.2em;
      margin: 3em auto; }
   .tabbed-box {
      width: 510px;
      background: #fff url(../images/blue.jpg) repeat-x bottom;
      border: 1px solid #ddd; }
   .tabbed-box .tabs li {
      list-style: none;
      float: left; }
   .tabbed-box .tabs li a {
      display: block;
      width: 100px;
      padding: 5px 0;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      color: #878;
      background: #fff url(../images/blue.jpg) repeat-x bottom; 
      border-left: 1px solid #ddd;
      border-bottom: 1px solid #ddd;}
   .tabbed-box .tabs li:first-child a {
      border-left: none; }
   .tabbed-box .tabs li a:hover {
      color: #333; }
   .tabbed-box .tabs li a:focus {
      outline: none; }
   .tabbed-box .tabs li a.active {
      background: #fff;
      color: #333;
      border-bottom: 1px solid #fff; }
   .tabbed-content {
      padding: 3em 1em 1em 1em;
      display: none; }
      
      
      
      
      }
      
  
</style>
<style>
        p.comments{
	     margin:0 auto;
	     width: 550px;
	     height: auto !important;
	     background-color: yellow;
	     align:center; 
	     border-style:solid;
	     border-width:5px;
	     box-shadow: 10px 10px 5px #888888;
      }

</style>

		<script language="javascript" type="text/javascript" src="jquery.js"></script>
    	<script>
        var currentTab = 1; // Set to a different number to start on a different tab.
        
        function openTab(clickedTab) {
           var thisTab = $(".tabbed-box .tabs a").index(clickedTab);
           $(".tabbed-box .tabs li a").removeClass("active");
           $(".tabbed-box .tabs li a:eq("+thisTab+")").addClass("active");
           $(".tabbed-box .tabbed-content").hide();
           $(".tabbed-box .tabbed-content:eq("+thisTab+")").show();
           currentTab = thisTab;
        }
        
        $(document).ready(function() {
           $(".tabs li:eq(0) a").css("border-left", "none");
           
           $(".tabbed-box .tabs li a").click(function() { 
              openTab($(this)); return false; 
           });
           
           $(".tabbed-box .tabs li a:eq("+currentTab+")").click()
        });
    </script>
    
    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {

            // RANDOM
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Mushrooms', 3],
              ['Onions', 1],
              ['Olives', 1],
              ['Zucchini', 1],
              ['Pepperoni', 2]
            ]);
			
            //RACE DeMO
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Race');
            data2.addColumn('number', 'Percent');
            data2.addRows([
	      <?php 
              echo "['White', ";
              echo $city['white'];
              echo "],";
              echo "['Black',";
              echo $city['black'];
              echo "],";
              echo "['Native',";
               if($city['indian'] <= 0){
		echo 0;
	      }else{
		echo $city['indian'];
	      }
              echo "],";
	      echo "['Asian',";
	      echo $city['asian'];
	      echo "],";
              echo "['Islander/Hawaiian',";
              if($city['Islander'] <= 0){
		echo 0;
	      }else{
		echo $city['Islander'];
	      }
              echo "],";
              echo "['Hispanic',";
              echo $city['hispanic'];
              echo "],";
	      echo "['Two Or More',";
	      if($city['twoOrMore'] <= 0){
		echo 0;
	      }else{
		echo $city['twoOrMore'];
	      }
	      echo "]";
	      
	      ?>
            ]);
			
			//AGE DEMO
            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'Age');
            data3.addColumn('number', 'Percent');
            data3.addRows([
	    <?php
              echo "['0-5'," ;
              echo $city['under5'];
              echo "],";
              echo "['5-18'," ;
              echo $city['under18']-$city['under5'];
              echo "],";
              echo "['18-65',"; 
              echo  1.0-$city['under65']-$city['under18'];
              echo "],";
	      echo "['65+',";
	      echo $city['under65'];
	      echo "]";
            ?>
            
            ]);
			
			//GENDER_DEMO
			var data4 = new google.visualization.DataTable();
            data4.addColumn('string', 'Gender');
            data4.addColumn('number', 'Percent');
            data4.addRows([
	     <?php
	      echo "['Male',";
	      echo 1-$city['female'];
	      echo "],";
              echo "['Female',";
              echo $city['female'];
              echo "]";
              
              ?>
             
            ]);
			
			//EDUCATION
			var data5 = new google.visualization.DataTable();
            data5.addColumn('string', 'Degree');
            data5.addColumn('number', 'Percent');
            data5.addRows([
            <?php
	      echo "['High School Only',";
	      echo $city['high_school']-$city['bachelor'];
	      echo "],";
              echo "['Bachelor or Higher',";
              echo $city['bachelor'];
              echo "]";
            ?>
            ]);

            // Set chart options
            var options = {'title':'How Much Pizza I Ate Last Night',
                           'width':400,
                           'height':300};
            // Set chart options
            var options2 = {'title':'Race Demographics:',
                           'width':450,
                           'height':400};
            // Set chart options
            var options3 = {'title':'Age Demographics',
                           'width':450,
                           'height':400};
						   
			var options4 = {'title':'Gender Demographics',
                           'width':450,
                           'height':400};
			
			var options5 = {'title':'Education',
                           'width':450,
                           'height':400};
			
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('pizza'));
            chart.draw(data, options);
			
            var chart2 = new google.visualization.PieChart(document.getElementById('Race_Dem'));
            chart2.draw(data2, options2);
			
            var chart3 = new google.visualization.PieChart(document.getElementById('Age_Dem'));
            chart3.draw(data3, options3);
			
			var chart4 = new google.visualization.PieChart(document.getElementById('Gender_Dem'));
            chart4.draw(data4, options4);
			
			var chart5 = new google.visualization.PieChart(document.getElementById('Education'));
            chart5.draw(data5, options5);
          }
        </script>

    
    
    
    
    
</head>

<body>
	<div id="header">
	  
	  <div id="navigation">
			<ul>
				<li ><a href="index.html">Home</a></li>
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
        <body>
        <?php 
	    echo "<center>";
	    echo "<p style=\"font-size:25px;\">CITY: ".$city['city']."</p>";
	    echo "<br>";
	    echo "<p style=\"font-size:25px;\">State: ".$city['state']."</p>";
	    echo "<br >";
	    echo "<p style=\"font-size:25px;\">County(s): ".$city['counties']."</p>";
	    
	  ?>
        
        
            <div id="wrap">
               <div class="tabbed-box">
                  <ul class="tabs">
                     <li><a href="#">Crime</a></li>
                     <li><a href="#">Demographics</a></li>
                     <li><a href="#">Econmics</a></li>
                     <li><a href="#">Housing</a></li>
                     <li><a href="#">Other</a></li>
                  </ul>
                  
                  <!-- CRIME -->
                  <div class="tabbed-content">
                     <p>No data yet... Come back later?</p>
                     <div id="pizza"></div>
                  </div>
                  
                  <!-- DEMOGRAPHICS -->
                  <div class="tabbed-content">
                    <br>
                    <div id="Race_Dem"></div>
                    <br><br>
                    <div id="Age_Dem"></div>
                    <br><br>
                    <div id="Gender_Dem"></div>
                    <br><br>
                    
                  </div>
                  
                  <!-- Econmics -->
                  <div class="tabbed-content">
                  	<br>
			<p> Per capita money income in the past 12 months: $<?php echo $city['per_capita'] ?></p>
			<br>
			<p>Median household income: $<?php echo $city['median_income'] ?></p>
			<br>
			<p>Poverty Percent: <?php echo $city['povertyLevel']*100 ?>%</p>
			
                   </div>
                   
                   <!-- Housing -->
                   <div class="tabbed-content">
                   		<br>
                    	<p>Homeownership rate:  <?php echo $city['ownerShipRate']*100 ?> %</p>
                    	<br>
                        <p>Median value of owner-occupied house: $<?php echo $city['median_value'] ?></p>
                        <br>
                        <p>Persons Per Household: <?php echo $city['per_house'] ?> people </p>
                        <br>
                        <p>House Holds:  <?php echo $city['house_holds'] ?> homes</p>
                        <br>
                        <p> Language other than English spoken at home(2007-2011): <?php echo $city['second_Lang']*100 ?>%</p>
                        <br>
                        <p> Same House in last year: <?php echo $city['same_House']*100 ?>%</p>
                        <br>
                     	<p>Median household income: $<?php echo $city['median_income'] ?></p>
                   </div>
                   
                   <!-- Other -->
                   <div class="tabbed-content">
                   		<br>
                    	<div id="Race_Dem"></div>
                        <br><br>
                        <p>Veterans (2007-2011): <?php echo $city['veterans'] ?></p>
                        <br>
                        <p>Foreign Born: <?php echo $city['foreign_born']*100 ?>%</p>
                        <br>
                        <p>Mean travel time to work:  <?php echo $city['travel_time'] ?>  (mins)</p> 
                        
                        
                        
                   </div>
                   
                   
               </div>
            </div>
            <p style="font-size:25px;"> COMMENTS: </p>;
            
            <?php
             if($comments!=null && mysql_num_rows($comments)>0){
		while($results = mysql_fetch_array($comments)){
		      echo "<p class=\"comments\">".$results['comment']."</p><br><br>";
		}
	      }
			     
	    ?>
	    <br>
	    <br>
	    <br>
	    <form method="post" action="comment.php">
	    <input type="hidden" name="id" value="<?php echo $text?>">
	    <textarea name="text" cols="100" rows="5">
	      Enter your comments here...
	    </textarea><br>
	    
	    <input type="submit" value="Submit" />
	    </form>
	  </body>
       
    </div> 
	 
	
	
<div id="footer">

		
		<span class="footnote">  2012 John Mecham All rights reserved</span>
	</div> <!-- /#footer -->
</body>
</html>