<?php 
/*
	The shepherd must make sure that his sheep do not stay with the wolf because 
	the wolf would ate them in that case. In any case, the shepherd wants to transfer 
	the wolf from one island to the other because he loves all the animals.

	The shepherd is the brain of this operation.
*/
class Shepherd implements LivingBeing {
	private $whoAmI = "Shepherd";
	private $name = "";

	public function __construct($name){
		$this->name = $name;			// Sets the name of the shepherd.
	}

	public function whoIsIt(){			// Return the type(variable whoAmI).
		return $this->whoAmI;
	}

	/*
		This method is used when shepherd is in destination island.

		This method is used to determine who needs to be taken to the starting island. 
		Method accepts the following:
				- Object of the starting island
				- Object of the boat
				- Itself
				- Object of the destination island
		It uses current island(destination island) to see who is in the island.

		The shepherd constantly checks if the wolf is on the island, and and he is careful 
		not to leave the wolf alone with the sheep.
	*/

	public function toStartingIsland($startingIsland, $boat, $shepherd, $destinationIsland){
		$wolf = $destinationIsland->isWolfInside();
		$sheep = $destinationIsland->isSheepInside();

		if ($wolf != null) {
			if ($sheep != null) {
				$shepherd->inBoatOnIsland($startingIsland, $destinationIsland, $shepherd, $wolf, $boat, 2);
			} else {
				$shepherd->inBoatOnIsland($startingIsland, $destinationIsland, $shepherd, null, $boat, 1);
			}
		} else {
			$shepherd->inBoatOnIsland($startingIsland, $destinationIsland, $shepherd, null, $boat, 1);
		}

	}

	/*
		This method is used when shepherd is in starting island.
		This method is used to determine who needs to be taken to the destination island. 
		Method accepts the following:
				- Object of the starting island
				- Object of the boat
				- Itself
				- Object of the destination island
		It uses current island(starting island) to see who is in the island.

		The shepherd constantly checks if the wolf is on the island, and and he is careful 
		not to leave the wolf alone with the sheep.
	*/

	public function toDestinationIsland($startingIsland, $boat, $shepherd, $destinationIsland){
		$wolf = $startingIsland->isWolfInside();			# Wolf object is stored in variable $wolf for a better
															# understanding of the code.
		$sheep = $startingIsland->isSheepInside();			# Sheep object is stored in variable $sheep
															# for a better understanding of the code.

		if ($wolf != null) {
			if ($sheep != null) {
				if ($startingIsland->howManySheeps() == 2) {
					$shepherd->inBoatOnIsland($destinationIsland,$startingIsland, $shepherd, $wolf, $boat, 2);
				} else {
					$shepherd->inBoatOnIsland($destinationIsland,$startingIsland, $shepherd, $sheep, $boat, 2);
				}
			} else {
				$shepherd->inBoatOnIsland($destinationIsland,$startingIsland, $shepherd, $wolf, $boat, 2);
			}
		} elseif ($sheep != null) {
			$shepherd->inBoatOnIsland($destinationIsland,$startingIsland, $shepherd, $sheep, $boat, 2);
		} else {
			$shepherd->inBoatOnIsland($destinationIsland,$startingIsland, $shepherd, null, $boat, 1);
		}
	}

	/*	This method is used to get passengers in and out of the boat 
		and to remove or add living beings on the island.

		Variable island1 is island on which passengers sill get in.
		Variable island2 is island on which passengers will get out.

		The shepherd will never be null, but animal can be null. 
		If statement is used to check whether animal is null or not.
	*/

	public function inBoatOnIsland($island1, $island2, $shepherd, $animal, $boat, $seats){
		$boat->inBoat($seats);
		
			if ($animal != null) {
				$island2->outOfIsland($animal);
				$island1->onIsland($animal);
			}
			$island2->outOfIsland($shepherd);
			$island1->onIsland($shepherd);

		$boat->outBoat($seats);
	}
}
 ?>