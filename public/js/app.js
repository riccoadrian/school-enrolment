function updateSchoolYear(e) {
    var school_year = e.target.value;
    var d = new Date(school_year);
    var year = d.getFullYear();

    document.getElementById('school_year').value = year + '-' + (year + 1);
    document.getElementById('hid_year').value = year;
}

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("recordsTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc"; 
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
                }
            }
        }

        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;
        } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

function deleteStudent(id, first_name) {
    if (confirm("Are you sure you want to delete student " + first_name + "?") == true) {
        $.ajax({
            url: '?action=delete&id=' + id,
            method: 'POST',
            contentType: 'application/json',
            success: function(result) {
                document.getElementById('rec-' + id).remove();

                var divContainerSection = document.getElementsByClassName('container')[0];
                var div = document.createElement('div');
                div.className = 'alert alert-success';
                div.textContent = 'Student deleted successfully!';
                divContainerSection.prepend(div);

                setTimeout(function() {
                    window.location.reload();
                }, 3000);
            }
        });
    };
}
