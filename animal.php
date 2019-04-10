<?php  
/*
	This is subclass of class livingBeing.
	With this two classes we will later create class sheep and class wolf.
*/
include 'livingBeing.php';

class Animal implements LivingBeing {
	protected $name = "";
	protected $isBird = false;
	protected $isReptile = false;
	protected $isHerbivorous = false;
	protected $isCarnivorous = false;
	protected $whoAmI;					// Variable is used to set the type of the animal.

	public function whoIsIt(){			// Returns the type of the animal.
		return $this->whoAmI;
	}
}

?>