<?php
/**
* https://github.com/BeLove/pentest-tools
* @sergeybelove
*
**/

$xml = file_get_contents("http://www.example.com/crossdomain.xml");
$xml = new SimpleXMLElement($xml);
foreach ($xml as $key => $value) {
    $domain = $value['domain'];
    if (preg_match("/^\*\./", $domain)) {
	$domain = substr($domain, 2);
    }
    echo $domain." - ";
    $ip = gethostbyname($domain);
    if ($ip) {
	echo "$ip\n";
    } else {
	echo "$$$$$\n"; // take your money! Domain is unregistered
    }
}