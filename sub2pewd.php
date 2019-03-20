<?php
$counter = "sys/pewdscounter.txt";
$url = "http://www.youtube.com/user/pewdiepie?sub_confirmation=1";
$views = (int) (trim(file_get_contents($counter)));
$views++;
file_put_contents($counter, $views);
header("Location:$url");
