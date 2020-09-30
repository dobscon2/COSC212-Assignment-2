<?php
    $scriptList = array('Resources/Libraries/jquery-3.5.1.min.js', 'Resources/Libraries/leaflet/leaflet.js', 'map.js');
    include('Resources/Private/header.php');
?>
        <section>
            <h2>Locations</h2>
            <div id="map"></div>
            <p>Our office is located at the Dunedin Holiday Park.</p>
            <p>We are open Monday - Friday from 9am - 5pm</p>
        </section>
<?php
    include('Resources/Private/footer.php');
?>