<?php

/* print_r($_COOKIE);
print_r(array_keys($_COOKIE)); */

/* Uos del IF ... ELSE */

/* if (in_array("_gcl_au_", array_keys($_COOKIE))) {
    echo "Hay una posible fuga de datos!";
}else{
    echo "Todo esta bien!";
} */


if (in_array("_gcl_au_", array_keys($_COOKIE))) {
    echo "Hay una posible fuga de datos (Google)!";
} elseif (
    in_array("_fbp", array_keys($_COOKIE)) && 
    $_COOKIE["_fbp"] == "fb.0.1687287549704.42108794"
) {
    echo "Hay una posible fuga de datos (Facebook)!";
} elseif (
    sizeof(
        array_filter(
            array_keys($_COOKIE), 
            function ($valor) {
                return str_contains($valor, '_ga');
            }
        )
    )
) {
    file_put_contents("prueba_cookie.json",json_encode($_COOKIE));
    echo "Revisa por favor tu sistema de archivos!";
} else {
    echo "Tu computadora esta libre de ataques!";
}
