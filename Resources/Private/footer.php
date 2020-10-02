<?php
echo "<footer>
            <ul>
                <li><strong>© Dunedin Car Rentals</strong></li>";
                if ($currentPage === 'admin.php' || $currentPage === 'vehicles.php' || $currentPage === 'vehicleManager.php') {
                    echo "<li><a href='index.php'>Logoff</a></li>";
                } else {
                    echo "<li><a href='admin.php'>Staff Login</a></li>";
                }
            echo "</ul>
        </footer>
    </main>

</body>
</html>";
?>