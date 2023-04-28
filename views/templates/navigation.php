<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a class="nav-item nav-link <?php echo $active == "dashboard" ? 'active' : ''; ?>" href="?action=dashboard">Dashboard</a>
        <a class="nav-item nav-link <?php echo $active == "addStudent" ? 'active' : ''; ?>" href="?action=addStudent">Add Student</a>
        <a class="nav-item nav-link <?php echo $active == "studentLists" ? 'active' : ''; ?>" href="?action=studentLists">Student Lists</a>
    </div>
</nav>
