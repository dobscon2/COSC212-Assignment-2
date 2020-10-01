<?php
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
</tr>
</thead>
<tbody>";
                    foreach ($bookings as $booking) {
                        echo "<tr>";
                        echo "<td>".$booking['number']."</td>";
                        echo "<td>".$booking['name']."</td>";
                        echo "<td>".$booking['pickup']['day']."/".$booking['pickup']['month']."/".$booking['pickup']['year']."</td>";
                        echo "<td>".$booking['dropoff']['day']."/".$booking['dropoff']['month']."/".$booking['dropoff']['year']."</td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </section>
<?php
    include('Resources/Private/footer.php');
?>