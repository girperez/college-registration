<?php
    class Profile extends Database{
        // for student profile
        public function getStudentProfile($user){
            $stmt=$this->connect()->prepare("SELECT Username, First_name, Phone_num, Email FROM student WHERE Username = ?");
            $stmt->execute([$user]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function getEnrolledCourses($user){
            $stmt=$this->connect()->prepare("SELECT e.CourseCode, c.Title, c.Duration FROM enrolled_course AS e INNER JOIN courselist AS c USING (CourseCode) WHERE e.Username = ?");
            $stmt->execute([$user]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function enrollCourse($coursecode, $user){
            $stmt=$this->connect()->prepare("INSERT INTO enrolled_course(Username, CourseCode) VALUES (?,?)");
            $stmt->execute([$user, $coursecode]);
        }

        // for teacher profile
        public function getTeacherProfile($user){
            $stmt=$this->connect()->prepare("SELECT Username FROM accounts WHERE Username = ?");
            $stmt->execute([$user]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }