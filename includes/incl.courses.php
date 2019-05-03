<?php
class Courses extends Database{

    public function getCourseList(){
        $stmt = $this->connect()->prepare("SELECT CourseCode, Title, Duration FROM courselist");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertCourse($title, $duration){
        $char1 = substr($title, 0, 3);
        $char2 = substr($title, -3, 3);
        $char3 = strlen($title);
        $coursecode = 'N-'.$char1.$char3.$char2;
        $stmt = $this->connect()->prepare("INSERT INTO courselist(CourseCode, Title, Duration) VALUES (?,?,?)");
        $stmt->execute([$coursecode, $title, $duration]);
    }
}