<?php
function checkRole($requiredRole) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
        echo "Access denied.";
        exit;
    }
}

function getRole(): string {
    if (isset($_SESSION['role'])) {
        return $_SESSION['role'];
    }

    throw new Exception("No role not found.");
}
