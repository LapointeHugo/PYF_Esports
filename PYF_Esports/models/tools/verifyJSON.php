<?php

function verifyJSON($json, $paramName) {
    if (empty($json[$paramName])) {
        http_response_code(400);
        die('Missing ' . $paramName);
    }
    else {
        return $json[$paramName];
    }
}
