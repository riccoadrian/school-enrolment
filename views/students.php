<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('templates/header.php'); ?>
    <title>Student Lists</title>
</head>
<body>
    <?php
    $active = "studentLists";

    include_once('templates/navigation.php');
    ?>
    <div class="container">
        <?php if (! empty($students)) { ?>
        <table id="recordsTable" class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>First Name<img src="/public/images/sort.png" class="float-end" height="15px" onclick="sortTable(0)" /></th>
                    <th>Last Name<img src="/public/images/sort.png" class="float-end" height="15px" onclick="sortTable(1)" /></th>
                    <th>School Year<img src="/public/images/sort.png" class="float-end" height="15px" onclick="sortTable(2)" /></th>
                    <th>Email<img src="/public/images/sort.png" class="float-end" height="15px" onclick="sortTable(3)" /></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) { ?>
                <tr id="rec-<?php echo $student['id']; ?>">
                    <td><?php echo $student['first_name'] ?></td>
                    <td><?php echo $student['last_name'] ?></td>
                    <td><?php echo $student['school_year'] ?></td>
                    <td><?php echo $student['email'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else {
            echo "Student table is empty!";
        }
        ?>
    </div>
</body>
<?php include_once('templates/footer.php'); ?>
</html>
