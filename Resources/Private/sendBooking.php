<?php
    $data = file_get_contents("php://input");
    $input_data = json_decode($data, true);

    $booking_file = file_get_contents("../bookings.json");
    $append_booking = json_decode($booking_file,true);
    $append_booking = $append_booking['bookings']['booking'];
    array_push($append_booking, $input_data);
    $output = json_encode($append_booking);
    file_put_contents('booking_test.json', $output);

    ?>
