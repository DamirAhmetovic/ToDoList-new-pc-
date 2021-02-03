<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // include "datalayer.php";
    $valid = true;
    if (empty($_POST["list_name"])) {
        $list_nameErr = "name is required";
        $valid = false;
    } else {
        $_POST["list_name"] = CleanupInput($_POST["list_name"]);

        if ($valid == true) {
            EditList($_POST);
            header("Location: ListIndex.php");
        }
    }
}
