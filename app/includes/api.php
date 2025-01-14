<?php

use Transip\Api\Library\TransipAPI;
function getApiUser(): string {
    return trim(file_get_contents('conf/transip.user'));
}
function getApiKey(): string {
    return trim(file_get_contents('conf/transip.pem'));
}

function getApiClient(): TransipAPI {
    return new TransipAPI(
        getApiUser(),
        getApiKey(),
        generateWhitelistOnlyTokens: false
    );
}
