<?php

include './utils/functions.php';
include './model/model_task.php';
include './model/model_category.php';

$message = '';
$tasksList = '';
$title = "Add a new task";


if (isset($_POST['submit'])) {
    if (
        isset($_POST['task']) && !empty($_POST['task']) &&
        isset($_POST['content']) && !empty($_POST['content']) &&
        isset($_POST['date']) && !empty($_POST['date'])
    ) {
        $task = nettoyage($_POST['task']);
        $content = nettoyage($_POST['content']);
        $date = nettoyage($_POST['date']);
        $category = nettoyage($_POST['category']);
        $bdd = DBconnect();
        $message = addTask($bdd, $task, $content, $date, $category);
    } else {
        $message = "Please fill in the required fields.";
    }
}

$bdd = DBconnect();

$data = showTasks($bdd);

foreach ($data as $task) {
    $tasksList = $tasksList . "<li><h3>{$task['name_task']} - {$task['date_task']}<h3> <p>{$task['content_task']}</p><p style='color:red'>Category: IL MANQUE ÇA</p></li>"; //!category
}

include './controller_header.php';
include './view/viewTasks.php';
include './view/footer.php';
