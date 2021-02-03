<?php
require "datalayer.php";
DeleteTask($_GET["list_id"]);
header("Location: ListIndex.php");
