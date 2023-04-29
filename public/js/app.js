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

function deleteStudent(id, name) {
    if (confirm("Are you sure you want to delete student " + name + "?") == true) {
        $.ajax({
            url: '/delete?id=' + id,
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

function validateForm() {
    var classname = 'fs-5 text-danger mt-2';

    var element = document.getElementById('name');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the name.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('date_of_birth');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the date of birth.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('enrolment_date');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the enrolment date.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('phone');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the phone number.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('mobile');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the mobile number.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('email');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the email address.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }

        let emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (! element.value.match(emailFormat)) {
            let text = 'Please enter a valid email address.';
            let div = createDivErrorElement(classname, text);

            if (divContainer.querySelector('#div-error') === null) {
                element.classList.add('bg-danger');
                divContainer.append(div);
            }
        } else {
            element.classList.remove('bg-danger');

            if (divContainer.querySelector('#div-error') !== null) {
                divContainer.querySelector('#div-error').remove();
            }
        }
    }

    var element = document.getElementById('first_contact_name');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the first contact name.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('first_contact_phone');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the first contact phone.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('second_contact_name');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the second contact name.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }

    var element = document.getElementById('second_contact_phone');
    var divContainer = element.closest("div");
    if (element.value == "") {
        let text = 'Please enter the second contact phone.';
        let div = createDivErrorElement(classname, text);

        if (divContainer.querySelector('#div-error') === null) {
            element.classList.add('bg-danger');
            divContainer.append(div);
        }
    } else {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }
}

function createDivErrorElement(classname, text) {
    var div = document.createElement('div');
    div.setAttribute('id', 'div-error');
    div.className = classname;
    div.textContent = text;

    return div;
}

window.addEventListener('input', (e) => {
    var element = e.target;
    var divContainer = element.closest("div");

    if (element.value !== "") {
        element.classList.remove('bg-danger');

        if (divContainer.querySelector('#div-error') !== null) {
            divContainer.querySelector('#div-error').remove();
        }
    }
});
