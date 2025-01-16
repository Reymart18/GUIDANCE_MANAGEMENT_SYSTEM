<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="ADMIN_DASHBOARD.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/css/ionicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css" rel="stylesheet">


</head>

<body>
    <div id="sidebar" class="sidebar">
        <div class="admin-header">
            <div class="admin-info">
                <ion-icon name="person-circle" class="admin-icon"></ion-icon>
                <div class="admin-name-container" style="margin-top: 7%;">
                    <p class="admin-name" style="margin-bottom:-5%;">ADMIN</p>
                    <p class="admin-role">System Administrator</p>
                </div>
            </div>
            <div class="toggle-container">
                <button id="sidebarToggle" class="toggle-btn">
                    <ion-icon name="caret-back"></ion-icon> </button>
            </div>
        </div>
        <ul class="menu">
            <li><a href="#"><ion-icon name="home-outline" class="icon"></ion-icon> <span>Dashboard</span></a></li>
            <li><a href="#"><ion-icon name="people-outline" class="icon"></ion-icon> <span>Students</span></a></li>
            <li><a href="#"><ion-icon name="warning-outline" class="icon"></ion-icon> <span>Violations</span></a></li>
            <li><a href="#"><ion-icon name="folder-outline" class="icon"></ion-icon> <span>Cases</span></a></li>
            <li><a href="#"><ion-icon name="notifications-outline" class="icon"></ion-icon> <span>Notifications</span></a></li>
            <li><a href="#"><ion-icon name="stats-chart-outline" class="icon"></ion-icon> <span>Reports</span></a></li>
            <li><a href="#"><ion-icon name="settings-outline" class="icon"></ion-icon> <span>Settings</span></a></li>

        </ul>
        <div class="logout-container">
            <button id="logoutBtn"></button>
        </div>

    </div>

    </div>

    </div>
    <div class="content">
        <!-- Main Content -->
        <marquee>Welcome to the Admin Dashboard</marquee>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="ADMIN_DASHBOARD.JS"></script>

</body>

</html>