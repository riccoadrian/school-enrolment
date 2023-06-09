<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('templates/header.php'); ?>
    <title>View Student</title>
</head>
<body>
    <?php
    $active = "";

    include_once('templates/navigation.php');
    ?>
    <div class="container">
        <div class="media d-flex m-auto mt-4 w-75">
        <?php
        if (isset($student['filename'])) {
            $filename = $student['filename'];
            $alt = explode('.', $filename)[0];
        ?>
            <div class="px-5">
                <img src="uploads/<?php echo $filename; ?>" class="align-self-start mr-3 rounded-circle" alt="<?php echo $alt; ?>" width="200px" height="200px">
            </div>
        <?php
        }
        ?>
            <div class="media-body ps-5">
                <h5 class="mt-0"><span class="fw-bold">Name:</span> <?php echo ucfirst($student['name']); ?></h5>
                <h5><span class="fw-bold">Date of Birth:</span> <?php echo $student['date_of_birth']; ?></h5>
                <h5><span class="fw-bold">Enrolment Date:</span> <?php echo $student['enrolment_date']; ?></h5>
                <h5><span class="fw-bold">Current School Year:</span> <?php echo $student['school_year']; ?></h5>
                <h5><span class="fw-bold">Phone:</span> <?php echo $student['phone']; ?></h5>
                <h5><span class="fw-bold">Mobile:</span> <?php echo $student['mobile']; ?></h5>
                <h5><span class="fw-bold">Email:</span> <?php echo $student['email']; ?></h5>
                <h5><span class="fw-bold">1st Contact Name:</span> <?php echo ucfirst($student['first_contact_name']); ?></h5>
                <h5><span class="fw-bold">1st Contact Phone:</span> <?php echo $student['first_contact_phone']; ?></h5>
                <h5><span class="fw-bold">2nd Contact Name:</span> <?php echo ucfirst($student['second_contact_name']); ?></h5>
                <h5><span class="fw-bold">2nd Contact Phone:</span> <?php echo $student['second_contact_phone']; ?></h5>
            </div>
        </div>
    </div>
</body>
<?php include_once('templates/footer.php'); ?>
</html>
