<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link <?php echo $active == "dashboard" ? 'active' : ''; ?>" href="/dashboard">Dashboard</a>
        <a class="nav-item nav-link <?php echo $active == "addStudent" ? 'active' : ''; ?>" href="/addStudent">Add Student</a>
        <a class="nav-item nav-link <?php echo $active == "studentLists" ? 'active' : ''; ?>" href="/studentLists">Student Lists</a>
        <a class="nav-item nav-link <?php echo $active == "report" ? 'active' : ''; ?>" href="/report">Report</a>
    </div>
</nav>
