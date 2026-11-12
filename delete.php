
<?php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {

    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

    if ($id === false || $id === null || $id <= 0) {
        die("Invalid student ID.");
    }

    $sql = "DELETE FROM students WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: view.php?deleted=1");
        exit;
    } else {
        echo "Error deleting record.";
    }

    mysqli_stmt_close($stmt);

} else {
    header("Location: view.php");
    exit;
}

mysqli_close($conn);

?>
