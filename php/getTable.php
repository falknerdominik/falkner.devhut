<?php
	$html = "";
	$html .= "<table><tr>";

	// scan folder, return array
	$allProjects = scandir('../packages/'); 
	
	for($i = count($allProjects)-2; $i < count($allProjects); $i++){
		
		// create both attributes of th td seperate. The Reasone for this is simple, 
		// we need to be carefull with the " and the '
		$ajaxFunktion = "loadProject('$allProjects[$i]')";
		$path = "background='packages/$allProjects[$i]/thumbnail/thumb.jpg'";
		
		// create the td
		$html .= "<td $path onclick=$ajaxFunktion>";
		
		$html .= "</td>";
		
	}
	
	for($i = count($allProjects)-1; $i < 16; $i++){
		$html .= "<td></td>";
		
		if($i == 3 || $i == 7 || $i == 11)
			$html .= "</tr><tr>";
	}
	
	$html .= "</table>";
	
	echo $html;

?>