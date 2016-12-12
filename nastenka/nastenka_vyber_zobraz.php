<?php
	// connect DB
	include $_SERVER['DOCUMENT_ROOT'] . "/authentification/connectdbbljpm.php";
	
	$sql = "SELECT * FROM nastenka ORDER BY datum DESC";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) 
	{
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo "<div class='container' style='min-height:250px;'>";
			// prvy riadok nadpis a datumy
			echo "<div class='row'>";
			echo "<div class='col-xs-0 col-sm-0 col-md-0 col-lg-1'></div>"; // empty column
			echo "<div class='col-xs-8 col-sm-9 col-md-7 col-lg-6'>";
			echo "<h3>" . $row["nazov"] . "</h3>\n";
			echo "</div>";
			
			echo "<div class='col-xs-4 col-sm-3 col-md-4 col-lg-3' style='text-align:right;'>";				
			if($row["dt_od"] && !$row["dt_do"])
				echo "<br><span class='nastenka_od_same font_10'> Dňa: " . $row["dt_od"] . "</span>";
			else if($row["dt_od"] && $row["dt_do"])
			{
				echo "<p><span class='nastenka_od font_10'> od: " . $row["dt_od"] . "</span></p>";
				echo "<p><span class='nastenka_od font_10'> do: " . $row["dt_do"] . "</span></p>";	
			}
			echo "</div>\n";	
			echo "</div>\n";	
			// druhy riadok datum a text oznamu
			echo "<div class='row'>";	
			echo "<div class='col-xs-0 col-sm-0 col-md-0 col-lg-1'></div>"; // empty column
			echo "<div class='col-xs-3 col-sm-2 col-md-3 col-lg-2'>";
			echo "<span class='nastenka_pridane font_10'>Pridané:<br>" . $row["datum"]. "</span>";
			echo "</div>\n";
			echo "<div class='col-xs-8 col-sm-10 col-md-8 col-lg-7'>";				
			echo "<br> <span class='font_9 color_15'>" . $row["oznam"] . "</span><br>";
			echo "</div>\n";
			echo "</div>\n";
			echo "</div>\n";
            
            if(strcmp($rola,"admin") === 0)
            {
                echo '<center><table><tr><td><form method="post" action="../nastenkaEdit.php">'."\n";
                echo '        <input type="hidden" name="datumEdit" value="'.$row["datum"]. '" />'."\n";
                echo '        <input type="submit" value="Upraviť" class="button someMagic">'."\n";
                echo '</form></td><td>'."\n";
                echo '<form method="post" action="../nastenkaEdit.php">'."\n";
                echo '        <input type="hidden" name="datumDelete" value="'.$row["datum"]. '" />'."\n";
                echo '        <input type="submit" value="Zmazať" class="button someMagic">'."\n";
                echo '</form></td></tr></table></center>'."\n";
            }
			echo "<hr>";
		}
	}
	
	// close connection
	mysqli_close($conn);
?>	
