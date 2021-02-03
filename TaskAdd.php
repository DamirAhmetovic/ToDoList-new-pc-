<?php
require "datalayer.php";
$AllLists = GetAllLists();
require "TaskAddCheckInput.php";
require "include/header.php";
?>

<div class="w3-container w3-red">
    <h2>add task</h2>
</div>

<form class="w3-container" method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
    <div class="TaskAddForm">
        <select class="mdb-select md-form" name="task_list_id">
            <?php foreach ($AllLists as $AllList) { ?>
                <option value=<?php echo $AllList["list_id"] ?>><?php echo $AllList["list_id"] . " " . $AllList["list_name"] ?> </option>
            <?php } ?>
        </select>

        <label class="w3-text-red"><b>task</b></label>
        <input class="w3-input w3-border w3-light-grey" type="text" name="task_name">
        <span class="error"> <?php echo $task_nameErr; ?></span>

        <label class="w3-text-red"><b>duration task</b></label>
        <input class="w3-input w3-border w3-light-grey" type="number" name="task_duration">
        <span class="error"> <?php echo $task_durationErr; ?></span>

        <select class="mdb-select md-form" name="task_status">
            <option value="to do"> to do </option>
            <option value="done"> done </option>
        </select>
    </div>
    <div class="TaskAddSubmit">
        <button type="submit" class="w3-btn w3-blue-grey">Add task</button>
    </div>
</form>

<?php
include "include/footer.php";
?>