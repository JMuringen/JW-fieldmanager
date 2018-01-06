<?php
date_default_timezone_set('Europe/Amsterdam');
$time = date('H:i:s');
$date = date('l d F Y');

$date = str_replace("Monday",      "Maandag",   $date); 
$date = str_replace("Tuesday",     "Dinsdag",   $date); 
$date = str_replace("Wednesday",   "Woensdag",  $date); 
$date = str_replace("Thursday",    "Donderdag", $date); 
$date = str_replace("Friday",      "Vrijdag",   $date); 
$date = str_replace("Saturday",    "Zaterdag",  $date);  
$date = str_replace("Sunday",      "Zondag",    $date); 

$date = str_replace("January",      "Januari",   $date); 
$date = str_replace("February",     "Februari",   $date); 
$date = str_replace("March",   		"Maart",  $date); 
$date = str_replace("April",    	"April", $date); 
$date = str_replace("May",      	"Mei",   $date); 
$date = str_replace("June",    		"Juni",  $date);  
$date = str_replace("July",      	"Juli",    $date);
$date = str_replace("August",      	"Augustus",   $date); 
$date = str_replace("September",    "September",   $date); 
$date = str_replace("October",   	"Oktober",  $date); 
$date = str_replace("November",    	"November", $date); 
$date = str_replace("December",     "December",   $date); 

?>

<div class="huidigegegevens">
    <div class="tijd">
         
        <?php echo "<p class='dt'>$time</p>"; ?>
    </div>
    <div class="mededeling">
                <p>Mededelingen hier</p>
            </div>
    <div class="datum">
        <?php echo "<p class='dt'>$date</p>"; ?>
    </div>
</div>

