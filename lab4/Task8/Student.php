<?php

class Student extends Human {
    protected $university;
    protected $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }

    public function getUniversity() {
        return $this->university;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setUniversity($university) {
        $this->university = $university;
    }

    public function setCourse($course) {
        $this->course = $course;
    }

    public function moveToNextCourse() {
        $this->course++;
    }
}