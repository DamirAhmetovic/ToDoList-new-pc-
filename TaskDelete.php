<?php
require "datalayer.php";
Delete1Task($_GET["task_id"]);
header("Location: ListIndex.php");
