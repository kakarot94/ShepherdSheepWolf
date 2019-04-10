<?php 
// Include all needed files.
include 'include.php';

// Creating all objects needed for this brain puzzle.
$wolf = new Wolf('Strong Wolf');
$sheep1 = new Sheep('Black Sheep');
$sheep2 = new Sheep('White Sheep');
$shepherd = new Shepherd('Milovan');

$boat = new Boat;

$startingIsland = new Island();
$destinationIsland = new Island();

// Let's settle an starting island.
$startingIsland -> onIsland($wolf);
$startingIsland -> onIsland($sheep1);
$startingIsland -> onIsland($sheep2);
$startingIsland -> onIsland($shepherd);

echo "Starting island:<br>";
$startingIsland->whoIsIn();

echo "________________________<br>";
echo "Destination island:<br>";
$destinationIsland->whoIsIn();

$counter = 1;	// The counter is used for marking every step of the way.

// --- Let's start the brain puzzle ---

/*
 In every turn the shepherd will go from starting island to the 
 destination island and back. 
 The shepherd will make two steps every loop.
*/
while (true) {  // The loop will run until the starting island is desert!

	// The shepherd starts from the starting island and goes to the destination island.
	$shepherd->toDestinationIsland($startingIsland, $boat, $shepherd, $destinationIsland);

	echo "________________________ level ".$counter."<br>";
	echo "Starting island:<br>";
	$startingIsland->whoIsIn();

	echo "________________________<br>";
	echo "Destination island:<br>";
	$destinationIsland->whoIsIn();

	// Whenever shepherd leaves the starting island, he will check if the starting island is desert.
	// If no, he will continue the transfer. If yes, the transfer is complete and the
	// brain puzzle is finished!
	if($startingIsland->isDesertIsland() == 0){
		$counter++;
		echo "________________________ level ".$counter."<br>";
		echo "<br><br><br>SHEEPE ARE SAFELY TRANSFERED TO THE ISLAND!!!
			 <br>THE SHEPHERD IS HAPPY AND THE WOLF IS HUNGRY :D<br><br>";
		return false;
	}

	$counter++; // One step in the loop is finished.

	// The shepherd returns to the starting island.
	$shepherd->toStartingIsland($startingIsland, $boat, $shepherd, $destinationIsland);

	echo "________________________ level ".$counter."<br>";
	echo "Starting island:<br>";
	$startingIsland->whoIsIn();

	echo "________________________<br>";
	echo "Destination island:<br>";
	$destinationIsland->whoIsIn();

	$counter ++; // Secont step in the loop is finished.
}

 ?>