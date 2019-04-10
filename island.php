<?php 
/*
	The island is used to store animals and shepherds. 
	The island possesses several methods: 
		method for the entry and exit of settlers to and from the island; 
		method to check who's on the island; 
		method for checking whether a wolf is on the island;
		method for checking whether the sheep is on the island;
		method for checking how many sheep on the island;
		method for checking whether the island is desert or not.

	The shepherd use island methods to transfer sheep safely from one to the other island.
*/
class Island {
	private $animals = array();					// Storage for animals and shepherd.	
	private $index = 0;

	public function onIsland($being){			// Being entering the island.
		$this->animals[] = $being;
	}

	public function outOfIsland($being){		// Being exiting the island.
		unset($this->animals[array_search($being, $this->animals)]);
	}

	public function whoIsIn(){					// Check who's on the island.
		foreach ($this->animals as $animal) {
			echo $animal->whoIsIt()."<br>";		// Calling method whoIsIt to 
		}										// echo the type of the animal.
		if ($this->animals == null) {
			echo "There is no one on the island!<br>";
		}
	}

	public function isWolfInside(){				// Check whether a wolf is on the island.
		foreach ($this->animals as $animal) {
			if ($animal->whoIsIt() == "Wolf") {
				return $animal;
			}
		}
	}

	public function isSheepInside(){			// Check whether the sheep is on the island.
		foreach ($this->animals as $animal) {
			if ($animal->whoIsIt() == "Sheep") {
				return $animal;
			}
		}
	}

	public function howManySheeps(){			// Check how many sheep on the island.
		$countSheep = 0;

		foreach ($this->animals as $animal) {
			if ($animal->whoIsIt() == "Sheep"){
				$countSheep ++;
			}
		}
		return $countSheep;
	}

	public function isDesertIsland(){			// Check whether the island is desert or not.
		return count($this->animals);
	}
}
 ?>