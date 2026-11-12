
<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $marks = $_POST['marks'];

    $sql = "INSERT INTO students
            (name, roll_no, course, semester, marks)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt, "sssid",
        $name, $roll_no, $course, $semester, $marks
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Student Added Successfully!</h2>";
        echo "<a href='index.php'>Back to Home</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
