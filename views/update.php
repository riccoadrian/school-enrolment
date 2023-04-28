<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('templates/header.php'); ?>
    <title>Edit Student</title>
</head>
<body>
    <?php
    $active = "";

    include_once('templates/navigation.php');
    ?>
    <div class="container">
    <?php
    if (! empty($messages)) {
        foreach ($messages as $message) {
    ?>
        <div class="alert <?php echo $message['type'] ?>">
            <?php echo $message['message']; ?>
        </div>
    <?php
        }
    }
    ?>
        <form method="POST" action="?action=update" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo (isset($student['name']) ? $student['name'] : ''); ?>" required />
            </div>
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo (isset($student['date_of_birth']) ? $student['date_of_birth'] : ''); ?>" required />
            </div>
            <div class="form-group">
                <label for="enrolment_date">Enrolment Date</label>
                <input type="date" class="form-control" id="enrolment_date" name="enrolment_date" value="<?php echo (isset($student['enrolment_date']) ? $student['enrolment_date'] : ''); ?>" onchange="updateSchoolYear(event)" required />
            </div>
            <div class="form-group">
                <label for="school_year">Current School Year</label>
                <input type="text" class="form-control" id="school_year" name="school_year" value="<?php echo (isset($student['school_year']) ? $student['school_year'] : ''); ?>" readonly />
                <input type="hidden" id="hid_year" name="hid_year" value="<?php echo (isset($student['year']) ? $student['year'] : ''); ?>" />
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo (isset($student['phone']) ? $student['phone'] : ''); ?>" placeholder="1234567890" pattern="[0-9]{10,11}" required />
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" value="<?php echo (isset($student['mobile']) ? $student['mobile'] : ''); ?>" placeholder="+12345678901" pattern="[+]{1}[0-9]{11,14}" required />
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($student['email']) ? $student['email'] : ''); ?>" required />
            </div>
            <div class="form-group">
                <label for="first_contact_name">1st Contact Name</label>
                <input type="text" class="form-control" id="first_contact_name" name="first_contact_name" value="<?php echo (isset($student['first_contact_name']) ? $student['first_contact_name'] : ''); ?>" required />
            </div>
            <div class="form-group">
                <label for="first_contact_phone">1st Contact Phone</label>
                <input type="tel" class="form-control" id="first_contact_phone" name="first_contact_phone" value="<?php echo (isset($student['first_contact_phone']) ? $student['first_contact_phone'] : ''); ?>" placeholder="1234567890" pattern="[0-9]{10,11}" required />
            </div>
            <div class="form-group">
                <label for="second_contact_name">2nd Contact Name</label>
                <input type="text" class="form-control" id="second_contact_name" name="second_contact_name" value="<?php echo (isset($student['second_contact_name']) ? $student['second_contact_name'] : ''); ?>" required />
            </div>
            <div class="form-group">
                <label for="second_contact_phone">2nd Contact Phone</label>
                <input type="tel" class="form-control" id="second_contact_phone" name="second_contact_phone" value="<?php echo (isset($student['second_contact_phone']) ? $student['second_contact_phone'] : ''); ?>" placeholder="1234567890" pattern="[0-9]{10,11}" required />
            </div>
            <input type="hidden" id="hid_id" name="hid_id" value="<?php echo (isset($student['id']) ? $student['id'] : ''); ?>" />
            <input type="submit" value="Update Student" name="submitBtn" class="btn btn-success" onclick="validateForm()" />
        </form>
    </div>
</body>
<?php include_once('templates/footer.php'); ?>
</html>
