<?php

function verifyJSON($json, $paramName) {
    if (empty($json[$paramName])) {
        http_response_code(400);
        die('Missing ' . $paramName);
    }
    else {
        if(is_string($json[$paramName])) {
            return trim($json[$paramName]);
        }
        else {
            return $json[$paramName];
        }
    }
}
