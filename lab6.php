<?php
$str = file_get_contents('http://grafika.me/node/37');
$reg = '/\S+\s?\:\=\s?[^\:\=]+(\;|\s)/sU';
preg_match_all($reg, $str, $matches, PREG_SET_ORDER, 0);
print_r($matches[0]);
/*for ($i=0; $i<count($matches[0]); $i++) {
echo $matches[0][$i]."<br/>";
}*/
?>