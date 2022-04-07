<?php

include '../../partials/scripts/set-manager.php';

if ($_GET['operatorid'] != '' && $_GET['grade'] != '') {
    $newGrade = Manager::submitGrade($_GET['operatorid'], $_GET['grade']);
    $gradeStars = Ifc::gradeStars($_GET['operatorid'], $newGrade);
    echo $gradeStars;
} else {
    echo 'nok';
}
