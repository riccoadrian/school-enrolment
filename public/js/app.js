function updateSchoolYear(e) {
    var school_year = e.target.value;
    var d = new Date(school_year);
    var year = d.getFullYear();

    document.getElementById('school_year').value = year + '-' + (year + 1);
    document.getElementById('hid_year').value = year;
}
