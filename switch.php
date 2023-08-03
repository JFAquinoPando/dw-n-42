<?php

$origen = "Latino";

switch ($origen) {
    case 'Latino':
        echo "Seguro habla español";
        break;
    case 'Europeo':
        echo "Seguro habla español, inglés, francés, alemán";
        break;
    case 'Gringo':
        echo "Seguro habla inglés";
        break;
    case 'Judio':
        echo "Seguro habla hebreo";
        break;

    default:
        echo "Habla chino";
        break;
}
