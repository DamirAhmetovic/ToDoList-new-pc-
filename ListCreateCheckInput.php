<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
    if (empty($_POST["list_name"])) {
        $list_nameErr = "name is required";
        $valid = false;
    } else {
        $_POST["list_name"] = CleanupInput($_POST["list_name"]);

        if ($valid == true) {
            AddList($_POST);
            header("Location: ListIndex.php");
        }
    }
}
