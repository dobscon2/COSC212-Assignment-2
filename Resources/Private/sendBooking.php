<?php
    $data = file_get_contents("php://input");
    $input_data = json_decode($data, true);

    $booking_file = file_get_contents("../bookings.json");
    $append_booking = json_decode($booking_file,true);
    $append_booking['bookings']['booking'][] = $input_data;
    $output = json_encode($append_booking);
    file_put_contents('../bookings.json', $output);
    echo http_response_code(200);
    ?>
