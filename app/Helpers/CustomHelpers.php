<?php

function getInitials($name)
{
    $initials = '';

    $parts = explode(' ', $name);
    foreach ($parts as $part) {
        $initials .= substr($part, 0, 1);
    }

    return strtoupper($initials);
}
