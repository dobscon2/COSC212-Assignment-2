<?php

echo "<!DOCTYPE html>
<head>

    <title>Dunedin Car Rentals</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='style.css'>
    ";

if (isset($scriptList) && is_array($scriptList)) {
    foreach ($scriptList as $script) {
        echo "<script src='$script'></script>
    ";
    }
}

echo "
</head>
";

$currentPage = basename($_SERVER['PHP_SELF']);

echo "<body>
    <main>
        <header>
            <h1>Dunedin Car Rentals</h1>
            <nav>
                <ul>";
if ($currentPage === 'index.php') {
    echo "<li>Home</li>";
} else {
    echo "<li><a href='index.php'>Home</a></li>";
}

if ($currentPage === 'book.php') {
    echo "<li>Make a booking</li>";
} else {
    echo "<li><a href='book.php'>Make a booking</a></li>";
}

if ($currentPage === 'locations.php') {
    echo "<li>Locations</li>";
} else {
    echo "<li><a href='locations.php'>Locations</a></li>";
}

echo "</ul>
</nav>
</header>";
?>

