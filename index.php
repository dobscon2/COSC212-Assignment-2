<?php
    $scriptList = array('Resources/Libraries/jquery-3.5.1.min.js', 'showReviews.js');
    include('Resources/Private/header.php');
    ?>

        <section>
            <h2>Welcome to Dunedin Car Rentals</h2>
            <p>Here at Dunedin Car Rentals we provide luxury cars available to rent at an affordable price for any budget.</p>
            <blockquote>"Explore our backyard with the ease and luxury you deserve."</blockquote>
            <p>Our offices are open 9am - 5pm Monday to Friday, but we are also available 24/7 online and over the phone.</p>
        </section>

        <section>
            <h2>Customer reviews</h2>
                <div id="reviews"></div>
        </section>

<?php
    include('Resources/Private/footer.php');
?>