<?php 
//fungsi hitung luas lingakaran
function luasLingkaran($Jarijari) {
    $pi = 3.14;
    return number_format($pi * $Jarijari * $Jarijari, 2);
}

 //fungsi hitung keliling lingkaran
function kelilingLingkaran($Jarijari){
    $pi = 3.14;
    return number_format(2 * $pi * $Jarijari, 2);
}

//fungsi hitung luas persegi
function luasPersegi($panjang, $lebar) {
    return number_format($panjang * $lebar, 2);
}

for ($i = 1; $i <= 100; $i++) {
    $jariJari3 = $i / 3;
    $jariJari5 = $i / 5;

    if ($i % 3 == 0 && $i % 5 == 0) {
        echo luasPersegi($i / 3, $i / 5) . PHP_EOL;
    } elseif ($i % 3 == 0) {
        echo luasLingkaran($jariJari3) . PHP_EOL;
    } elseif ($i % 5 == 0) {
        echo kelilingLingkaran($jariJari5) . PHP_EOL;
    } else {
        echo number_format($i, 2) . PHP_EOL;
    }
}

?>