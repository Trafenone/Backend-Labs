<?php
$char = 'а';

switch ($char) {
    case 'а':
    case 'е':
    case 'и':
    case 'і':
    case 'ї':
    case 'о':
    case 'у':
    case 'ю':
    case 'я':
        echo "Голосна буква";
        break;
    default:
        echo "Приголосна буква";
}
?>