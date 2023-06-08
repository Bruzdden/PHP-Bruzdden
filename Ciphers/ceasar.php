<?php
function _decryptText($text, $password) {
    $alphabet = str_split('ABCDEFGHIJKLNOPQRSTUVWXYZ');

    $textLenght = strlen($text);
    $keyLenght = strlen($password);

    $result = '';
    for ($i = 0; $i < $textLenght; $i++){
        if (!in_array($text[$i], $alphabet)){
            $result .= $text[$i];
        }
        else{
            $letterIndex = array_search($text[$i], $alphabet);
            $keyIndex = array_search($password[$i % $keyLenght], $alphabet);
            $index = ($letterIndex - $keyIndex + 25) % 25;
            $result .= $alphabet[$index];
        }
    }
    return $result;
}


$password = "HELLO";
$text = "KSNCL HQY CEKQAQ DEHKIYEW XCQGQLZ EVGYUYB ZNBYY UANSCMOJRU GLGTYBTSSUS 
YO ZLCAZHZCTZPQ FSSXQ. WYLR WQ RUID MHXQ RVFCQ. PZYSJ DWBTRUTB VZWH WQ 
FXUNQ, EOS GLM TCQXQ, LG WQ IZI GLKECU (TUDSMPJ W TCLQL) L BDUVSAI DW 
AEHDPYWUC. I RZGSM DWBTRUM YSOQ GEOYSMI KOZI AEHGZGOA YL ZRLP WVZ IHW 
GEVUMHZJOV TCZXLPEQQP L GHPQ FL ACWWVLGBCEE AH MLGBVUEAQ KWBBWWF. ";

echo _decryptText($text, $password);
