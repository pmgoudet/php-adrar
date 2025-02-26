<?php

$bdd = DBconnect();

function addTask($bdd, $task, $content, $date, $category)
{
    try {
        $req = $bdd->prepare("INSERT INTO tasks (`name_task`, `content_task`, `date_task`, `id_category`) VALUES (?,?,?,?);");
        $req->bindParam(1, $task, PDO::PARAM_STR);
        $req->bindParam(2, $content, PDO::PARAM_STR);
        $req->bindParam(3, $date, PDO::PARAM_STR);
        $req->bindParam(4, $category, PDO::PARAM_STR);
        $req->execute();
        return "Registration completed.<br> $task - $date <br> $content.";
        header('Refresh:0');
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}

function showTasks($bdd)
{
    try {
        $req = $bdd->prepare('SELECT `name_task`, `content_task`, `date_task`, `id_category` FROM tasks;');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    } catch (EXCEPTION $e) {
        return $e->getMessage();
    }
}
