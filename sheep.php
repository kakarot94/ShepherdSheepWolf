<?php 
/*
	This type of the animal can be eaten by cornivorous.
*/
class Sheep extends Animal {

	public function __construct($name){
		$this->name = $name;
		$this->isHerbivorous = true;	
		$this->whoAmI = "Sheep";		// Type of animal.
	}
}
 ?>