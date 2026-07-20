<?php

echo Menu::item([
    "name"  => "Dashboard",
    "icon"  => "bi bi-speedometer2",
    "route" => "home/index"
]);

echo Menu::item([
    "name"  => "User Management",
    "icon"  => "bi bi-people-fill",
    "route" => "#",
    "links" => [
        ["route"=>"user/index","text"=>"Manage User","icon"=>"bi bi-person"],
        ["route"=>"role/index","text"=>"Manage Role","icon"=>"bi bi-shield-lock"],
    ]
]);

echo Menu::item([
    "name"  => "Doctor Management",
    "icon"  => "bi bi-person-vcard-fill",
    "route" => "#",
    "links" => [
        ["route"=>"doctor/index","text"=>"Doctors","icon"=>"bi bi-person-badge"],
        ["route"=>"consultation/index","text"=>"Consultation","icon"=>"bi bi-heart-pulse"],
        ["route"=>"schedule/index","text"=>"Doctor Schedule","icon"=>"bi bi-calendar-week"],
    ]
]);

echo Menu::item([
    "name"  => "Patient Management",
    "icon"  => "bi bi-hospital",
    "route" => "#",
    "links" => [
        ["route"=>"patient/index","text"=>"Patients","icon"=>"bi bi-person-lines-fill"],
        ["route"=>"appointment/index","text"=>"Appointments","icon"=>"bi bi-calendar-check"],
    ]
]);

echo Menu::item([
    "name"  => "Medicine Master",
    "icon"  => "bi bi-capsule-pill",
    "route" => "#",
    "links" => [
        ["route"=>"medicine/index","text"=>"Medicine List","icon"=>"bi bi-capsule"],
        ["route"=>"generic/index","text"=>"Generic","icon"=>"bi bi-prescription2"],
        ["route"=>"manufacturer/index","text"=>"Manufacturer","icon"=>"bi bi-building"],
        ["route"=>"type/index","text"=>"Medicine Type","icon"=>"bi bi-tags"],
        ["route"=>"strength/index","text"=>"Strength","icon"=>"bi bi-speedometer"],
        ["route"=>"dose/index","text"=>"Dose","icon"=>"bi bi-eyedropper"],
        ["route"=>"frequency/index","text"=>"Frequency","icon"=>"bi bi-arrow-repeat"],
        ["route"=>"duration/index","text"=>"Duration","icon"=>"bi bi-clock-history"],
        ["route"=>"instruction/index","text"=>"Instruction","icon"=>"bi bi-card-list"],
    ]
]);

echo Menu::item([
    "name"  => "Prescription",
    "icon"  => "bi bi-file-earmark-medical",
    "route" => "prescription/index",
]);

echo Menu::item([
    "name"  => "Reports",
    "icon"  => "bi bi-bar-chart-line",
    "route" => "report/index"
]);

echo Menu::item([
    "name"  => "Settings",
    "icon"  => "bi bi-gear-fill",
    "route" => "setting/index"
]);