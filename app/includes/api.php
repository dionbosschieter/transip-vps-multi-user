<?php

function getApiUser(): string {
    return trim(file_get_contents('conf/transip.user'));
}
function getApiKey(): string {
    return trim(file_get_contents('conf/transip.pem'));
}
