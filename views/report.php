<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('templates/header.php'); ?>
    <title>Report</title>
</head>
<body>
    <?php
    $active = "report";

    include_once('templates/navigation.php');
    ?>
    <div class="container">
        <?php if (! empty($records)) { ?>
        <table id="recordsTable" class="table table-striped m-auto w-50 text-center">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Year<img src="/public/images/sort.png" id="sort-icon" class="float-end" height="15px" onclick="sortTable(0)" /></th>
                    <th class="text-center">Number of Students<img src="/public/images/sort.png" id="sort-icon" class="float-end" height="15px" onclick="sortTable(1)" /></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $record) { ?>
                <tr>
                    <td><?php echo $record['year'] ?></td>
                    <td><?php echo $record['no_of_students'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else {
            echo "Report table is empty!";
        }
        ?>
    </div>
</body>
<?php include_once('templates/footer.php'); ?>
</html>
