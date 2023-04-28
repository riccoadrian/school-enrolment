<?php

class StudentModel
{
    public $db;

    public function createStudent($params)
    {
        $message = [];

        try {
            $keys = array_keys($params);
            $columns = implode(',', $keys);
            $values = [];

            foreach ($keys as $key) {
                $values[] = ':'.$key;
            }

            $values = implode(',', $values);

            $query = "INSERT INTO student (".$columns.") VALUES(".$values.")";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':first_name', $params['first_name'], \PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $params['last_name'], \PDO::PARAM_STR);
            $stmt->bindParam(':date_of_birth', $params['date_of_birth'], \PDO::PARAM_STR);
            $stmt->bindParam(':enrolment_date', $params['enrolment_date'], \PDO::PARAM_STR);
            $stmt->bindParam(':school_year', $params['school_year'], \PDO::PARAM_STR);
            $stmt->bindParam(':year', $params['year'], \PDO::PARAM_INT);
            $stmt->bindParam(':phone', $params['phone'], \PDO::PARAM_STR);
            $stmt->bindParam(':mobile', $params['mobile'], \PDO::PARAM_STR);
            $stmt->bindParam(':email', $params['email'], \PDO::PARAM_STR);
            $stmt->bindParam(':first_contact_name', $params['first_contact_name'], \PDO::PARAM_STR);
            $stmt->bindParam(':first_contact_phone', $params['first_contact_phone'], \PDO::PARAM_STR);
            $stmt->bindParam(':second_contact_name', $params['second_contact_name'], \PDO::PARAM_STR);
            $stmt->bindParam(':second_contact_phone', $params['second_contact_phone'], \PDO::PARAM_STR);
            $stmt->execute();

            $message = [
                'type'    => 'alert-success',
                'message' => 'Student added successfully!'
            ];
        } catch(Exception $e) {
            $message = [
                'type'    => 'alert-danger',
                'message' => 'Error: '.$e->getMessage()
            ];
        }

        return $message;
    }

    public function getStudents()
    {
        $query = "SELECT * FROM student ORDER BY year, first_name";
        $students = $this->db->query($query)->fetchAll();

        return $students;
    }

    public function getStudent($id)
    {
        $query = "SELECT * FROM student WHERE id={$id}";
        $student = $this->db->query($query)->fetch();

        return $student;
    }

    public function deleteStudent($id)
    {
        $query = "DELETE FROM student WHERE id={$id}";
        $this->db->query($query);
    }
}
