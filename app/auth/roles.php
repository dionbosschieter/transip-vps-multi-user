<?php

function checkRoles(array $requiredRoles) {
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $requiredRoles)) {
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
