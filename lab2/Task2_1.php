<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

function findDuplicates($arr): void {
    $occurrences = array_count_values($arr);

    foreach ($occurrences as $element => $count) {
        if ($count > 1) {
            echo "<p>Елемент '$element' повторюється $count разів</p>";
        }
    }
}

$array = [1, 2, 3, 4, 2, 5, 6, 3, 7, 8, 3, "a", "b", "c", "d", "a"];
echo "<p> Вхідні дані: " .  implode(" ", $array) . "</p>";
findDuplicates($array);

function generateAnimalName($syllables): string {
    $animalTypes = ['Кішка', 'Собака', 'Хом\'як', 'Птах'];

    $randomAnimalType = $animalTypes[array_rand($animalTypes)];

    $generatedName = '';
    $numSyllables = mt_rand(2, 4);

    for ($i = 0; $i < $numSyllables; $i++) {
        $randomSyllable = $syllables[array_rand($syllables)];
        $generatedName .= $randomSyllable;
    }

    return $randomAnimalType . ' ' . mb_convert_case($generatedName, MB_CASE_TITLE, "UTF-8");
}

$syllablesArray = ['ко', 'тя', 'рі', 'па', 'зу', 'ма', 'то', 'ла', 'су', 'пе', 'че', 'ба', 'го', 'ль', 'до', 'ми', 'на', 'та', 'ло', 'ва', 'ка', 'ри', 'не', 'що', 'за', 'ха', 'йо', 'ру', 'жи', 'фа', 'ун', 'іг', 'їн', 'де', 'лі', 'хо', 'цу', 'ві', 'є', 'ю', 'ї'];
$animalName = generateAnimalName($syllablesArray);
echo $animalName;

function createArray() : array {
    $length = mt_rand(3, 7);
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[$i] = mt_rand(10, 20);
    }

    return $array;
}

function combineArrays($first, $second) {
    $merge = array_merge($first, $second);

    $merge = array_unique($merge);

    sort($merge);

    return $merge;
}


$firstArray = createArray();
$secondArray = createArray();
$combineArray = combineArrays($firstArray, $secondArray);

var_dump($firstArray);
var_dump($secondArray);
var_dump($combineArray);


$users = array("Max" => 2004, "Alexander" => 2003, "Julia" => 2000, "Dmitry" => 2000);

function sortUsers($array, $param) {
    $sortedArray = $array;

    if($param === "key") {
        ksort($sortedArray);
    } else {
        asort($sortedArray);
    }

    return $sortedArray;
}

$newSortedUsersByKey = sortUsers($users, "key");
$newSortedUsersByValue = sortUsers($users, "value");

print_r($newSortedUsersByKey);
print_r($newSortedUsersByValue);
?>
</body>
</html>


