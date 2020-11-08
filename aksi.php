<?php
$masukan = $_POST["isi"];
// $karakter = preg_replace("/[^a-z A-Z 0-9 , . ! ?]/", "", $masukan);
$lower = strtolower($masukan);

$char = array("!",",",".","?");
for ($x = 0; $x <= count($char); $x++) {
    $lower = str_replace($char[$x],' '.$char[$x], $lower);    
}

$algoritma = $_POST["algoritma"];
$bahasa = $_POST["bahasa"];
$gramNumber = $_POST["gram-number"];
$result  = null;



$condition = $algoritma."/".$bahasa."/".$gramNumber;

switch($condition){

//// 5gram
    case "witten-bell/1/5":
        $ip = "127.0.0.1 2501";
        break;
    case "witten-bell/2/5":
        $ip = "127.0.0.1 2502";
        break;
    case "modified-kn/1/5":
        $ip = "127.0.0.1 2503";
        break;
    case "modified-kn/2/5":
        $ip = "127.0.0.1 2504";
        break;
    case "kneser-ney/1/5":
        $ip = "127.0.0.1 2505";
        break;
    case "kneser-ney/2/5":
        $ip = "127.0.0.1 2506";
        break;
    case "back-off/1/5":
        $ip = "127.0.0.1 2507";
        break;
    case "back-off/2/5":
        $ip = "127.0.0.1 2508";
        break;
//// 3gram
    case "witten-bell/1/3":
        $ip = "127.0.0.1 2509";
        break;
    case "witten-bell/2/3":
        $ip = "127.0.0.1 2510";
        break;
    case "modified-kn/1/3":
        $ip = "127.0.0.1 2511";
        break;
    case "modified-kn/2/3":
        $ip = "127.0.0.1 2512";
        break;
    case "kneser-ney/1/3":
        $ip = "127.0.0.1 2513";
        break;
    case "kneser-ney/2/3":
        $ip = "127.0.0.1 2514";
        break;
    case "back-off/1/3":
        $ip = "127.0.0.1 2515";
        break;
    case "back-off/2/3":
        $ip = "127.0.0.1 2516";
        break;
    default:
        $ip = "";
        break;
}

exec("echo \"{$lower}\" | nc {$ip}", $result);

$char2 = array(" !"," ,"," ."," ?");
for ($x = 0; $x <= count($char2); $x++) {
    $temp = str_replace(' ','',$char2[$x]);
    $result[0] = str_replace($char2[$x], $temp, $result[0]);    
}

echo $result[0] ?? "";
?>