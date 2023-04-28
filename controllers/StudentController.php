<?php

class StudentController
{
    public $model;

    public function createStudentAction()
    {
        $params = [];
        $messages = [];
        $filename = null;
        $uploadError = 0;

        if (isset($_POST['submitBtn'])) {
            if (! empty($_FILES["file"]["name"])) {
                $targetDir = "uploads/";
                $filename = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $filename;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = ['jpg', 'jpeg', 'png'];

                if (! file_exists($targetFilePath)) {
                    if (in_array($fileType, $allowTypes)) {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                            $messages[] = [
                                'type'    => 'alert-success',
                                'message' => "The file <b>" . $filename . "</b> has been uploaded successfully."
                            ];
                        } else {
                            $uploadError = 1;

                            $messages[] = [
                                'type'    => 'alert-danger',
                                'message' => "Sorry, there was an error uploading your file."
                            ];
                        }
                    } else {
                        $uploadError = 1;

                        $messages[] = [
                            'type'    => 'alert-danger',
                            'message' => "Sorry, only JPG, JPEG, and PNG files are allowed to upload."
                        ];
                    }
                } else {
                    $uploadError = 1;

                    $messages[] = [
                        'type'    => 'alert-danger',
                        'message' => "The file <b>" . $filename . "</b> already exists."
                    ];
                }
            }

            if ($uploadError == 1) {
                return require_once '../views/create.php';
            }

            $params = [
                'filename' => $filename,
                'name' => $_POST['name'],
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

    public function deleteStudentAction()
    {
        if (! empty($_GET['id'])) {
            $this->model->deleteStudent($_GET['id']);
        }
    }

    public function updateStudentAction()
    {
        $student = [];

        if (! empty($_GET['id'])) {
            $student = $this->model->getStudent($_GET['id']);
        }

        $params = [];
        $id = '';
        $messages = [];
        $filename = null;
        $uploadError = 0;

        if (isset($_POST['submitBtn'])) {
            if (! empty($_FILES["file"]["name"])) {
                $targetDir = "uploads/";
                $filename = basename($_FILES["file"]["name"]);
                $targetFilePath = $targetDir . $filename;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                $allowTypes = ['jpg', 'jpeg', 'png'];

                if (! file_exists($targetFilePath)) {
                    if (in_array($fileType, $allowTypes)) {
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                            $messages[] = [
                                'type'    => 'alert-success',
                                'message' => "The file <b>" . $filename . "</b> has been uploaded successfully."
                            ];
                        } else {
                            $uploadError = 1;

                            $messages[] = [
                                'type'    => 'alert-danger',
                                'message' => "Sorry, there was an error uploading your file."
                            ];
                        }
                    } else {
                        $uploadError = 1;

                        $messages[] = [
                            'type'    => 'alert-danger',
                            'message' => "Sorry, only JPG, JPEG, and PNG files are allowed to upload."
                        ];
                    }
                } else {
                    $uploadError = 1;

                    $messages[] = [
                        'type'    => 'alert-danger',
                        'message' => "The file <b>" . $filename . "</b> already exists."
                    ];
                }
            }

            if ($uploadError == 1) {
                return require_once '../views/create.php';
            }

            $params = [
                'filename' => $filename,
                'name' => $_POST['name'],
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

            $id = $_POST['hid_id'];

            $messages[] = $this->model->updateStudent($params, $id);
        }

        return require_once '../views/update.php';
    }

    public function getSummaryAction()
    {
        $records = $this->model->getSummary();

        return require_once '../views/report.php';
    }
}
