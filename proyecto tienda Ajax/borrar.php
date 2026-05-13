<?php
session_start();
if (isset($_POST['clear']) && $_POST['clear'] == 'clear_session') {
    unset($_SESSION['productos']);
    echo json_encode(['status' => 'success']);
}
?>