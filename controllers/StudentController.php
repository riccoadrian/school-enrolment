<?php

class StudentController
{
    public $model;

    public function createStudentAction()
    {
        $params = [];
        $messages = [];

        if (isset($_POST['submitBtn'])) {
            $params = [
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'date_of_birth' => $_POST['date_of_birth'],
                'enrolment_date' => $_POST['enrolment_date'],
                'school_year' => $_POST['school_year'],
                'year' => $_POST['hid_year'],
                'phone' => $_POST['phone'],
                'mobile' => $_POST['mobile'],
                'email' => $_POST['email'],
                'first_contact_name' => $_POST['first_contact_name'],
                'first_contact_phone' => $_POST['first_contact_phone'],
                'second_contact_name' => $_POST['second_contact_name'],
                'second_contact_phone' => $_POST['second_contact_phone']
            ];

            $messages[] = $this->model->createStudent($params);
        }

        return require_once '../views/create.php';
    }

    public function getStudentsAction()
    {
        $students = $this->model->getStudents();

        return require_once '../views/students.php';
    }

    public function getStudentAction()
    {
        $student = [];

        if (! empty($_GET['id'])) {
            $student = $this->model->getStudent($_GET['id']);
        }

        return require_once '../views/student.php';
    }
}