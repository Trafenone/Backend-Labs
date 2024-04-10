<?php

require_once 'Human.php';
require_once 'Student.php';
require_once 'Programmer.php';

$student = new Student(180, 70, 20, 'ZTU', 1);
$student->moveToNextCourse();
echo "Студент переведений на новий курс: " . $student->getCourse() . "<br>";

$programmer = new Programmer(170, 60, 25, ['PHP', 'JavaScript'], '3 years');
$programmer->addProgrammingLanguage('Python');
echo "Мови програмування програміста: " . implode(', ', $programmer->getProgrammingLanguages());

$programmer->setHeight(175);
$programmer->setWeight(70);

echo "Програміст, зріст {$programmer->getHeight()}, вага {$programmer->getWeight()}";