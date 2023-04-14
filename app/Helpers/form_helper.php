<?php
function display_validation_error($err, $field)
{
    if (isset($err)) {
        if ($err->hasError($field)) {
            return $err->getError($field);
        } else {
            return false;
        }
    }
}

function retain_value($err, $field)
{
    if (isset($err)) {
        return $field;
    } else {
        return "";
    }
}
