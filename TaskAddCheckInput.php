<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
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

        if ($valid == true) {
            addtask($_POST);
            header("Location: ListIndex.php");
        }
    }
}
