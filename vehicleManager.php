<?php
    include ('Resources/Private/header.php');

    echo "<section><h2>Vehicle Details</h2>";
    $json_import = file_get_contents('Resources/vehicles.json');
    $vehicles = json_decode($json_import, true);

    if (isset($_POST['currentRego'])) {
        $count = 0;
        $index = 0;
        foreach ($vehicles['fleet']['vehicle'] as $vehicle) {
            if ($vehicle['registration'] === $_POST['currentRego']) {
                $index = $count;
            }
            $count += 1;
        }

        $vehicles['fleet']['vehicle'][$index]['registration'] = $_POST['vehicleRegistration'];
        $vehicles['fleet']['vehicle'][$index]['vehicleType'] = $_POST['vehicleType'];
        $vehicles['fleet']['vehicle'][$index]['description'] = $_POST['vehicleDescription'];
        $vehicles['fleet']['vehicle'][$index]['pricePerDay'] = $_POST['vehiclePrice'];

        $output = json_encode($vehicles);
        file_put_contents('Resources/vehicles.json', $output);
        header("Location: vehicles.php");
    } else {
        if (isset($_POST['newVehicle'])) {
            $newVehicle = array('registration' => $_POST['vehicleRegistration'], 'vehicleType' => $_POST['vehicleType'], 'description' => $_POST['vehicleDescription'], 'pricePerDay' => $_POST['vehiclePrice']);
            $vehicles['fleet']['vehicle'][] = $newVehicle;

            $output = json_encode($vehicles);
            file_put_contents('Resources/vehicles.json', $output);
            header("Location: vehicles.php");
        }
    }

    if (isset($_GET['vehicle'])) {
        foreach ($vehicles['fleet']['vehicle'] as $vehicle) {
            if ($vehicle['registration'] === $_GET['vehicle']) {
                echo "<form id='vehicleDetails' method='post' action='"; echo $_SERVER['PHP_SELF']; echo "'>
<fieldset>
<legend>Vehicle Details</legend>
<label for='vehicleRegistration'>Registration:</label>
<input type='text' id='vehicleRegistration' name='vehicleRegistration' value='". $vehicle['registration'] . "'>
<label for='vehicleType'>Type:</label>
<select id='vehicleType' name='vehicleType'>";
if ($vehicle['vehicleType'] === "Small") {
    echo "<option value='Small' selected>Small</option>";
} else {
    echo "<option value='Small'>Small</option>";
}
if ($vehicle['vehicleType'] === "Medium") {
    echo "<option value='Medium' selected>Medium</option>";
} else {
    echo "<option value='Medium'>Medium</option>";
}

if ($vehicle['vehicleType'] === "Large") {
    echo "<option value='Large' selected>Large</option>";
} else {
    echo "<option value='Large'>Large</option>";
}

if ($vehicle['vehicleType'] === "Luxury") {
    echo "<option value='Luxury' selected>Luxury</option>";
} else {
    echo "<option value='Luxury'>Luxury</option>";
}
echo "</select>
<label for='vehicleDescription'>Description:</label>
<input type='text' id='vehicleDescription' name='vehicleDescription' value='". $vehicle['description'] ."'>
<label for='vehiclePrice'>Price per day: $</label>
<input type='number' id='vehiclePrice' name='vehiclePrice' value='". $vehicle['pricePerDay'] . "'>
<input type='hidden' id='currentRego' name='currentRego' value='" . $_GET['vehicle'] . "'/>
<input type='submit' formaction='deleteVehicle.php' value='Delete Vehicle'>
<input type='submit' value='Save Vehicle'>
</fieldset>
</form>";
            }
        }

    } else {
        echo "<form id='vehicleDetails' method='post' action='"; echo $_SERVER['PHP_SELF']; echo "'>
<fieldset>
<legend>Vehicle Details</legend>
<label for='vehicleRegistration'>Registration:</label>
<input type='text' id='vehicleRegistration' name='vehicleRegistration'>
<label for='vehicleType'>Type:</label>
<select id='vehicleType' name='vehicleType'>
<option value='Small'>Small</option>
<option value='Medium'>Medium</option>
<option value='Large'>Large</option>
<option value='Luxury'>Luxury</option>
</select>
<label for='vehicleDescription'>Description:</label>
<input type='text' id='vehicleDescription' name='vehicleDescription'>
<label for='vehiclePrice'>Price per day: $</label>
<input type='number' id='vehiclePrice' name='vehiclePrice'>
<input type='hidden' id='newVehicle' name='newVehicle' value='true'>
<input type='submit' value='Save Vehicle'>
</fieldset>
</form>";
    }

    echo "</section>";
    include ('Resources/Private/footer.php');
?>
