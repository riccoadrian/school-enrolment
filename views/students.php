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
                    <th>Name<img src="/public/images/sort.png" id="sort-icon" class="float-end" height="15px" onclick="sortTable(0)" /></th>
                    <th>School Year<img src="/public/images/sort.png" id="sort-icon" class="float-end" height="15px" onclick="sortTable(1)" /></th>
                    <th>Email<img src="/public/images/sort.png" id="sort-icon" class="float-end" height="15px" onclick="sortTable(2)" /></th>
                    <th>View</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) { ?>
                <tr id="rec-<?php echo $student['id']; ?>">
                    <td><a href="mailto:<?php echo $student['email']; ?>"><?php echo $student['name']; ?></a></td>
                    <td><?php echo $student['school_year']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><a href="?action=viewStudent&id=<?php echo $student['id']; ?>" class="btn btn-primary">View</a></td>
                    <td><a href="#" onclick="deleteStudent(<?php echo $student['id']; ?>, '<?php echo $student['name']; ?>')" class="btn btn-danger">Delete</a></td>
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
