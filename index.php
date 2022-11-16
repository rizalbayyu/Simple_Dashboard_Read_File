<!DOCTYPE html>
<html>
<head>
<script>
function startTime() {
    var today = new Date();
    var d = today.getDate();
    var mm = today.getMonth() + 1;
    var y = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML = d + "-" + mm + "-" + y + " " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
<h1> Dashboard Report Backup</h1>
</head>

<body onload="startTime()">

<h2><div id="clock"></div></h2>

<?php

foreach (glob("dailyReport/*.txt") as $file){
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $output = '
    <table border = 2 class="table table-bordered table-striped">
    <tr>
    <th>Report Backup</th>
    </tr>';

    while(!feof($myfile)) {
        // echo fgets($myfile) . "<br>";
        $output .= '
        <tr>
         <td>'.fgets($myfile).'</td>
        </tr>';
      }
      fclose($myfile);
      echo $output;
    }
    ?> 
</body>
</html>