<?php
// Start session
session_start();

// Handle logout request
$data = json_decode(file_get_contents('php://input'), true); // Get JSON input

if (isset($data['action']) && $data['action'] === 'logout') {
    // Destroy the session to log the user out
    session_unset();
    session_destroy();

    // Respond with success
    echo json_encode(['success' => true]);
} else {
    // Respond with failure if action is not 'logout'
    echo json_encode(['success' => false]);
}
?>
