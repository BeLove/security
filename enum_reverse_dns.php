<?php
/**
* https://github.com/BeLove/pentest-tools
* @sergeybelove
*
**/

// bgp.he.net/search?search%5Bsearch%5D=domain&commit=Search
$file = fopen("log.txt", "w");
$start = "192.168.";
$min = 0;
$max = 25;
$count = 0;
for ($i = $min; $i <= $max; $i++) {
    for ($j = 1; $j <= 254; $j++) {
	$host = $start.$i.".".$j;
	$res = explode("\t", shell_exec("dig +noall +answer -x ".$host));
	if (isset($res[2])) {
	    fwrite($file, $res[2]);
	}
    }
}
fclose($file);