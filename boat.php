<?php 
/*
	This class transfers living being from one island to another.
	It can carry maximum of two passengers.
	Has two methods:
		- one to get passengers in to boat
		- one to get passengers off the boat
	If to many passengers try to get on the boat, message is returned
	that the boat is full.
*/
class Boat {
	private $countAll = 0;							// Variable for counting the passengers.

	public function inBoat($countAll){				// Method for geting passengers in the boat.
		$totalInside = $this->countAll + $countAll;
		if ($totalInside > 2) {
			echo "Boat is full";
		} else {
			$this->countAll = $totalInside;			// It serves to track the number of passengers on board.
		}
	}

	public function outBoat($countAll){				// Method for geting passengers off the boat.
		$totalInside = $this->countAll - $countAll;
		if ($totalInside < 0) {
			echo "Boat is empty";
		} else {
			$this->countAll = $totalInside;			// It serves to track the number of passengers on board.
		}
	}
}

 ?>