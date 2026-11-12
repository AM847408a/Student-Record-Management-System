
<?php
include 'db.php';

$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>

<div class="records-container">

    <h1>Student Records</h1>
    <p class="subtitle">All Registered Students</p>

    <a href="index.php" class="back-home">
        + Add New Student
    </a>

    <?php if (isset($_GET['deleted'])) { ?>
        <p class="success-message">
            Student deleted successfully!
        </p>
    <?php } ?>

    <div class="table-container">

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No.</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Marks</th>
                <th>Action</th>
            </tr>

            <?php if (mysqli_num_rows($result) > 0) { ?>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo htmlspecialchars($row['name']); ?></td>

                    <td><?php echo htmlspecialchars($row['roll_no']); ?></td>

                    <td><?php echo htmlspecialchars($row['course']); ?></td>

                    <td><?php echo $row['semester']; ?></td>

                    <td><?php echo $row['marks']; ?></td>

                    <td>
                        <button
                            type="button"
                            class="delete-btn"
                            onclick="openDeleteModal(<?php echo (int)$row['id']; ?>)">
                            Delete
                        </button>
                    </td>
                </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="7">
                        No student records found.
                    </td>
                </tr>

            <?php } ?>

        </table>

    </div>

</div>


<!-- Confirmation Popup -->

<div id="deleteModal" class="modal">

    <div class="modal-content">

        <h2>Are You Sure?</h2>

        <p>
            Do you really want to delete this student record?
        </p>

        <form action="delete.php" method="POST">

            <input type="hidden" name="id" id="deleteId">

            <button type="submit" class="confirm-btn">
                Confirm Delete
            </button>

            <button
                type="button"
                class="cancel-btn"
                onclick="closeDeleteModal()">
                Back
            </button>

        </form>

    </div>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>


 
