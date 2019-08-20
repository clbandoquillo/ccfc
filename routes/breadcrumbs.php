<?php

//Login
Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login', route('login'));
});

//Welcome
Breadcrumbs::for('welcome', function ($trail) {
    $trail->push('Login', route('welcome'));
});

// Home
Breadcrumbs::for('studentDashboard', function ($trail) {
    $trail->push('Main', route('studentDashboard'));
});

// Home / Make Attendance
Breadcrumbs::for('getStudAttendanceFrm', function ($trail,$classCode) {
    $trail->parent('studentDashboard');
    $trail->push('Make Attendance', route('getStudAttendanceFrm',$classCode));
});

//Teacher
Breadcrumbs::for('teacherDashboard', function ($trail) {
    $trail->push('Main', route('teacherDashboard'));
});

Breadcrumbs::for('forApproval', function ($trail) {
    $trail->parent('teacherDashboard');
    $trail->push('For Approval', route('forApproval'));
});

Breadcrumbs::for('getAttendance', function ($trail,$subjectID) {
    $trail->parent('forApproval');
    $trail->push('Attendance', route('getAttendance',$subjectID));
});

Breadcrumbs::for('assignBeadle', function ($trail,$classcode) {
    $trail->parent('teacherDashboard');
    $trail->push('Assign Beadle', route('assignBeadle',$classcode));
});

Breadcrumbs::for('sClassAttendance', function ($trail,$classcode) {
    $trail->parent('teacherDashboard');
    $trail->push('Class Attendance', route('sClassAttendance',$classcode));
});

