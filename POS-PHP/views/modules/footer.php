<footer class="main-footer">
    <?php
        // Starting year (the year your system launched)
        $startYear = 2025;  

        // Current year
        $currentYear = date("Y");  

        // App / company details
        $appName = "Genesis Plus POS"; 
        $owner   = "Bismark Technology"; 

        // Build year text: show range only if current year > start year
        $yearText = ($currentYear > $startYear) ? "$startYear - $currentYear" : $startYear;
    ?>
    
    <strong>&copy; <?php echo $yearText; ?> - <?php echo $appName; ?></strong>
    | All rights reserved by <?php echo $owner; ?>
</footer>
