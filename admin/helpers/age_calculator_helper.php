<?php


function calculateAge($dob)
{
    if (empty($dob)) {
        return '';
    }

    $birthDate = new DateTime($dob);
    $today = new DateTime();

    return $today->diff($birthDate)->y ." Years";
}


