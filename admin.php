<?php
    if (isset($_POST['index']) && $_POST['index'] != null) {
        $json_file = file_get_contents('Resources/bookings.json');
        $json_data = json_decode($json_file);

        $bookings = $json_data;

        $index = (int)$_POST['index'];
        print_r($bookings->bookings->booking);

        unset($bookings->bookings->booking[$index]);

        $bookings->bookings->booking = array_values($bookings->bookings->booking);

        $output = json_encode($bookings);
        file_put_contents('Resources/bookings.json', $output);
        header("Location: admin.php");
    }
    include('Resources/Private/header.php');
?>
        <section>
            <h2>Confirmed Bookings</h2>
            <table id="bookings">
                <?php
                    $json_file = file_get_contents('Resources/bookings.json');
                    $bookings = json_decode($json_file, true);
                    $bookings = $bookings['bookings']['booking'];

                    echo "<thead>
<tr>
<th>number</th>
<th>name</th>
<th>pickup</th>
<th>dropoff</th>
<th>Cancel?</th>
</tr>
</thead>
<tbody>";
                    $count = 0;
                    foreach ($bookings as $booking) {
                        echo "<tr>";
                        echo "<td>".$booking['number']."</td>";
                        echo "<td>".$booking['name']."</td>";
                        echo "<td>".$booking['pickup']['day']."/".$booking['pickup']['month']."/".$booking['pickup']['year']."</td>";
                        echo "<td>".$booking['dropoff']['day']."/".$booking['dropoff']['month']."/".$booking['dropoff']['year']."</td>";
                        echo "<td><form method='post' action='"; echo $_SERVER['PHP_SELF']; echo "'><input type='hidden' name='index' class='index' value='".$count."'><input type='submit' value='Cancel Booking'></form></td>";
                        echo "</tr>";
                        $count += 1;
                    }
                ?>
                </tbody>
            </table>
        </section>
<?php
    include('Resources/Private/footer.php');
?>