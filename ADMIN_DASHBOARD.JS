document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const arrowIcon = toggleBtn.querySelector('ion-icon');
    const logoutIcon = document.querySelector('.logout-container ion-icon'); // Select the logout icon

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');

        if (sidebar.classList.contains('collapsed')) {
            arrowIcon.name = 'caret-forward';
            if (logoutIcon) {
                logoutIcon.style.marginRight = '0'; // Adjust logout icon on collapse
            }
        } else {
            arrowIcon.name = 'caret-back';
            if (logoutIcon) {
                logoutIcon.style.marginRight = '25px'; // Reset logout icon margin
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const logoutContainer = document.querySelector('.logout-container');
    const logoutLink = document.createElement('a');
    logoutLink.href = '#'; // Set the logout URL (for frontend)
    logoutLink.innerHTML = `<ion-icon name="log-out-outline"></ion-icon><span>Logout</span>`;
    logoutContainer.appendChild(logoutLink);

    // Add event listener for the logout link
    logoutLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default anchor behavior

        const sidebar = document.getElementById('sidebar');

        // Temporarily disable transition and lock sidebar height
        sidebar.style.transition = 'none'; // Remove transition
        sidebar.style.height = `${sidebar.offsetHeight}px`; // Lock the height

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to log out.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, log out',
            cancelButtonText: 'No, cancel',
            reverseButtons: true
        }).then((result) => {
            // Re-enable transition and clear height lock after SweetAlert closes
            sidebar.style.transition = ''; // Restore transition
            sidebar.style.height = ''; // Clear height lock

            if (result.isConfirmed) {
                // Make an AJAX request to logout.php to handle the backend logic
                fetch('logout.php', {
                    method: 'POST', // POST method
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ action: 'logout' }) // Send a logout action
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Redirect to login page if logout was successful
                            window.location.href = 'admin_login.php';
                        } else {
                            Swal.fire('Error', 'Something went wrong during logout', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Error', 'Something went wrong', 'error');
                    });
            } else {
                // Cancel action: ensure sidebar height is properly restored
                sidebar.style.transition = ''; // Reset transition
                sidebar.style.height = ''; // Reset height
            }
        });
    });
});
