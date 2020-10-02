<?php
    include ('Resources/Private/header.php');

    echo "<section>
<h2>Manage Vehicles</h2>";

    $json_import = file_get_contents('Resources/vehicles.json');
    $vehicles = json_decode($json_import, true);

    echo "<div id='smallCars'><h3>Small Cars</h3>";
    foreach ($vehicles['fleet']['vehicle'] as $vehicle) {
        if ($vehicle['vehicleType'] === "Small") {
            echo "<p><a href='vehicleManager.php?vehicle=". rawurldecode($vehicle['registration']) ."'>". $vehicle['registration'] ."</a></p>";
        }
    }
    echo "</div>";

    echo "<div id='mediumCars'><h3>Medium Cars</h3>";
    foreach ($vehicles['fleet']['vehicle'] as $vehicle) {
        if ($vehicle['vehicleType'] === "Medium") {
            echo "<p><a href='vehicleManager.php?vehicle=". rawurldecode($vehicle['registration']) ."'>". $vehicle['registration'] ."</a></p>";
        }
    }
    echo "</div>";

    echo "<div id='largeCars'><h3>Large Cars</h3>";
    foreach ($vehicles['fleet']['vehicle'] as $vehicle) {
        if ($vehicle['vehicleType'] === "Large") {
            echo "<p><a href='vehicleManager.php?vehicle=". rawurldecode($vehicle['registration']) ."'>". $vehicle['registration'] ."</a></p>";
        }
    }
    echo "</div>";

    echo "<div id='luxuryCars'><h3>Luxury Cars</h3>";
    foreach ($vehicles['fleet']['vehicle'] as $vehicle) {
        if ($vehicle['vehicleType'] === "Luxury") {
            echo "<p><a href='vehicleManager.php?vehicle=". rawurldecode($vehicle['registration']) ."'>". $vehicle['registration'] ."</a></p>";
        }
    }
    echo "</div>";

    echo "<p><a href='vehicleManager.php'>Add a new vehicle</a></p>";
echo "</section>";



    include('Resources/Private/footer.php');
?>
