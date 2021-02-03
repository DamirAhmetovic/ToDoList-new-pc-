<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
    if (empty($_POST["task_list_id"])) {
        $task_list_idErr = "list is required";
        $valid = false;
    } else {
        $_POST["task_list_id"] = CleanupInput($_POST["task_list_id"]);
    }
    if (empty($_POST["task_name"])) {
        $task_nameErr = "name is required";
        $valid = false;
    } else {
        $_POST["task_name"] = CleanupInput($_POST["task_name"]);
    }
    if (empty($_POST["task_duration"])) {
        $task_durationErr = "duration is required";
        $valid = false;
    } else {
        $_POST["task_duration"] = CleanupInput($_POST["task_duration"]);
    }
    if (empty($_POST["task_status"])) {
        $task_statusErr = "status is required";
        $valid = false;
    } else {
        $_POST["task_status"] = CleanupInput($_POST["task_status"]);
    }
    if ($valid == true) {
        EditTask($_POST);
        header("Location: ListIndex.php");
    }
}
