<?php

echo Menu::item([
    "name"  => "User Management",
    "icon"  => "nav-icon fa fa-users",
    "route" => "#",
    "links" => [
        ["route" => "user/index", "text" => "Manage User", "icon" => "fa fa-user nav-icon"],
        ["route" => "role/index", "text" => "Manage Role", "icon" => "fa fa-key nav-icon"],
    ]
]);

echo Menu::item([
    "name"  => "Patients",
    "icon"  => "nav-icon fa fa-user-md",
    "route" => "#",
    "links" => [
        ["route" => "patient/create", "text" => "Add Patient", "icon" => "fa fa-user-plus nav-icon"],
        ["route" => "patient/index",  "text" => "Manage Patients", "icon" => "fa fa-users nav-icon"],
    ]
]);

echo Menu::item([
    "name"  => "Medicine",
    "icon"  => "nav-icon fa fa-medkit",
    "route" => "#",
    "links" => [
        ["route" => "medicines/index",     "text" => "Medicine List",        "icon" => "fa fa-medkit nav-icon"],
        ["route" => "generic/index",      "text" => "Medicine Generic",     "icon" => "fa fa-flask nav-icon"],
        ["route" => "manufacturer/index", "text" => "Manufacturer",         "icon" => "fa fa-industry nav-icon"],
        ["route" => "type/index",         "text" => "Medicine Type",        "icon" => "fa fa-tags nav-icon"],
        ["route" => "strength/index",     "text" => "Medicine Strength",    "icon" => "fa fa-balance-scale nav-icon"],
        ["route" => "type/index",         "text" => "Medicine Type",        "icon" => "fa fa-medkit nav-icon"],
        ["route" => "dose/index",         "text" => "Medicine Dose",        "icon" => "fa fa-eyedropper nav-icon"],
        ["route" => "frequency/index",    "text" => "Medicine Frequency",   "icon" => "fa fa-repeat nav-icon"],
        ["route" => "duration/index",     "text" => "Medicine Duration",    "icon" => "fa fa-clock-o nav-icon"],
        ["route" => "instruction/index",  "text" => "Medicine Instruction", "icon" => "fa fa-list-alt nav-icon"],
    ]
]);

?>