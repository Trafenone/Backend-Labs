<?php

require_once 'Human.php';
require_once 'Student.php';
require_once 'Programmer.php';

$student = new Student(180, 70, 20, 'ZTU', 1);
$student->moveToNextCourse();

$programmer = new Programmer(170, 60, 25, ['PHP', 'JavaScript'], '3 years');
$programmer->addProgrammingLanguage('Python');

$programmer->setHeight(175);
$programmer->setWeight(70);

$student->giveBirth();
echo "<br>";
$programmer->giveBirth();

echo "<br>";

$student->cleanRoom();
echo "<br>";
$student->cleanKitchen();

echo "<br>";

$programmer->cleanRoom();
echo "<br>";
$programmer->cleanKitchen();
