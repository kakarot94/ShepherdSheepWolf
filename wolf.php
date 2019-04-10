<?php 
/*
	This animal can eat sheep.
*/
class Wolf extends Animal {
	
	public function __construct($name){
		$this->name = $name;
		$this->isCarnivorous = true;
		$this->whoAmI = "Wolf";			// Sets the type of the animal.
	}
}
 ?>