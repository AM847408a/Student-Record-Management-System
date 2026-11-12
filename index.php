
<!DOCTYPE html>
<html>
<head>
    <title>Student Record Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Student Record Management System</h1>
    <h3>Enter Student Details</h3>

    <form action="add.php" method="POST">

        <label>Student Name</label>
        <input type="text" name="name" placeholder="Enter Name" required>

        <label>Roll Number</label>
        <input type="text" name="roll_no" placeholder="Enter Roll Number" required>

        <label>Course</label>
        <input type="text" name="course" placeholder="Enter Course" required>

        <label>Semester</label>
        <input type="number" name="semester" placeholder="Enter Semester" required>

        <label>Marks</label>
        <input type="number" name="marks" placeholder="Enter Marks"
               min="0" max="100" step="0.01" required>

        <button type="submit" class="add-btn">
            Add to Database
        </button>

    </form>

    <a href="view.php" class="delete-btn">
        View / Delete Existing Records
    </a>

</div>

</body>
</html>
