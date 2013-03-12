<?php 

class Package{
		
		private $path;
		private $projectname;
		private $description;
		private $dependencies;
		private	$slider;
		
		
		public function __construct($_projectname){
			$this->projectname = $_projectname;
			$this->path = "packages/$this->projectname";
			
			// initalize Package
			$this->createSliderHTML();
			$this->createDescriptionHTML();
			$this->createDependenciesHTML();
		}
		
		private function createSliderHTML(){
			// html output	
			$html = "";						
			
			// read description
			// create path to link file
			$path = "../$this->path/link.txt";
			
			// fopen($path, r = readable, ...)
			$file = fopen($path, 'r');
			
			// fread(open file, size in bytes you wanna read)
			$link = fread($file, filesize($path));
			
			// close the file
			fclose($file);
			
			
			// beginn the slider node
			$html .= "<div class='slider-wrapper theme-default'><div id='slider' class='nivoSlider'>";
			
			// Wichtig bei allen Bildern ist das wir vom Pfad des index.html ausgehen!
			// splash
			$html .= "<a href='$link'><img src='$this->path/slices/splash.jpg' data-thumb='$this->path/slices/splash.jpg' alt='' data-transition='slideInLeft' /></a>"; 
			
			// other slides
			$html .= "<img src='$this->path/slices/1.png' data-thumb='$this->path/slices/1.png' alt='' data-transition='slideInLeft' />";
			$html .= "<img src='$this->path/slices/2.png' data-thumb='$this->path/slices/2.png' alt='' data-transition='slideInLeft' />";
			$html .= "<img src='$this->path/slices/3.png' data-thumb='$this->path/slices/3.png' alt='' data-transition='slideInLeft' />";			
			
			// end the nivoslider node
			$html .= "</div>";
			
			// : Caption
			
			// end the slider theme
			$html .= "</div>";
			
			// Save in element variable
			$this->slider = $html;	
		}
	
		private function createDescriptionHTML(){
			// ACHTUNG: Script befinden sich in einem anderen platz deshalb ../ vor dem Pfad
			// create path
			$path = "../$this->path/description.html";
			
			// fopen($path, r = readable, ...)
			$file = fopen($path, 'r');
			
			// fread(open file, size in bytes you wanna read)
			$html = fread($file, filesize($path));
			
			// close the file
			fclose($file);
			
			// store html in description
			$this->description = $html;
		}
		
		private function createDependenciesHTML(){
			// ACHTUNG: Script befinden sich in einem anderen platz deshalb ../ vor dem Pfad
			// create path
			$path = "../$this->path/dependencies.html";
			
			// fopen($path, r = readable, ...)
			$file = fopen($path, 'r');
			
			// fread(open file, size in bytes you wanna read)
			$html = fread($file, filesize($path));
			
			// close the file
			fclose($file);
			
			// store html in description
			$this->dependencies = $html;
		}

		public function sendResponse(){
			echo $this->description . "***" . $this->slider . "***" . $this->dependencies;
		}
}

?>