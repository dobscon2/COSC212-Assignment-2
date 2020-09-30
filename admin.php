<?php
    $scriptList = array('Resources/Libraries/jquery-3.5.1.min.js', 'bookings.js');
    include('Resources/Private/header.php');
?>
        <section>
            <h2>Confirmed Bookings</h2>
            <table id="bookings"></table>
        </section>

<?php
    include('Resources/Private/footer.php');
?>