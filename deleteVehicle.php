<?php
    if (isset($_POST['currentRego'])) {
        $json_import = file_get_contents('Resources/vehicles.json');
        $vehicles = json_decode($json_import);

        $count = 0;
        $index = 0;

        foreach ($vehicles->fleet->vehicle as $vehicle) {
            if ($vehicle->registration === $_POST['currentRego']) {
                $index = $count;
            }
            $count += 1;
        }

        unset($vehicles->fleet->vehicle[$index]);

        $vehicles->fleet->vehicle = array_values($vehicles->fleet->vehicle);

        $output = json_encode($vehicles);
        file_put_contents('Resources/vehicles.json', $output);
        header("Location: vehicles.php");
    }
?>
