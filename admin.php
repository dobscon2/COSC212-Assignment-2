<?php
    $scriptList = array('Resources/Libraries/jquery-3.5.1.min.js', 'bookings.js');
    include('Resources/Private/header.php');
?>
        <section>
            <h2>Confirmed Bookings</h2>
            <table id="bookings">
                <?php
                    $json_file = file_get_contents('Resources/bookings.json');
                    $bookings = json_decode($json_file, true);
                    $bookings = $bookings['bookings']['booking'];

                    print(sizeof($bookings));
                ?>
            </table>
        </section>
<?php
    include('Resources/Private/footer.php');
?>