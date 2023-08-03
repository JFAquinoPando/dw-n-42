<?php
    define("TAMANHO_MAX", 500000);
    exec("git --version", $salida, $resultado_codigo);


    $salidaImagen = [];
    $codImagen = [];
    function convertir($carpeta, $archivo){
        if(filesize($carpeta.$archivo) > TAMANHO_MAX){
            exec(
                'python C:\xampp\htdocs\dw-n-42\convertir.py '.$archivo, 
                $salidaImagen, 
                $codImagen
            );

            return [
                $salidaImagen,
                $codImagen
            ];

        }
    }


    var_dump([
        $salida,
        $resultado_codigo
    ]);

    /* if (filesize("./images/tablero.jpg") > 500000){
        exec('python C:\xampp\htdocs\dw-n-42\convertir.py', $salidaImagen, $codImagen);
    }

    var_dump([
        $salidaImagen,
        $codImagen
    ]); */
    $carpeta = "images/";
    if($manejarCarpeta = opendir($carpeta)){
        while ($archivo = readdir($manejarCarpeta)) {
            $extension = pathinfo($carpeta.$archivo, PATHINFO_EXTENSION);
            switch ($extension) {
                case 'png':
                case 'jpeg':
                case 'jfif':
                case 'gif':
                    list($salidaImagen[],$codImagen[]) = convertir($carpeta, $archivo);
                    break;
                
                default:
                    echo "no se admite archivo: ".$archivo;
                    break;
            }
        }
    }



    var_dump([
        $salidaImagen,
        $codImagen
    ]);

