<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "guidance_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get all resolved cases
$query = "
    SELECT 
        cases.case_id, 
        cases.case_title, 
        cases.status, 
        students.first_name, 
        students.last_name 
    FROM cases 
    LEFT JOIN students ON cases.student_id = students.student_id 
    WHERE cases.status = 'Resolved'
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Cases</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title">Resolved Cases</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Case ID</th>
                                    <th>Case Title</th>
                                    <th>Status</th>
                                    <th>Student Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['case_id'] . "</td>";
                                        echo "<td>" . $row['case_title'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                        echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>No resolved cases found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
