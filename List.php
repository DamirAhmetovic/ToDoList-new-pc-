<?php
include "datalayer.php";
if (!isset($_GET["list_id"])) {
    die("Error: no list_id given.");
}

$task_order = '';
switch ($_GET['sort_column']) {
    case 'duration':
        $task_order = ' ORDER BY task_duration';
        break;
    case 'status':
        $task_order = ' ORDER BY task_status';
        break;
}

$list_id = $_GET["list_id"];
$list = GetList($list_id);
$sort = $_GET['sort_column'];

include "include/header.php";
?>
<!-- First Grid -->
<form action="TaskAdd.php?list_id=" method="post">
    <button class="w3-button w3-green">Add</button>
</form>
<?php
$tasks = GetTasksForLists($list['list_id'], $task_order);
?>
<div class="list_name">
    <h2> <?php echo $list['list_name']; ?>
        <form action="ListEdit.php?list_id=<?php echo $list['list_id']; ?>" method="post">
            <button class="w3-button w3-red">edit</button>
        </form>
    </h2>
    <div class="w3-row-padding w3-padding-64 w3-container">
        <table class="w3-table-all w3-small">
            <thead>
                <tr class="w3-red">
                    <th>id</th>
                    <th>task</th>
                    <th><a href="http://localhost/jaar%202/ToDoList/List.php?list_id=<?= $list_id ?>&sort_column=duration">duration</a></th>
                    <th>status</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php foreach ($tasks as $task) {
                ?>

                    <tr>
                        <td><?php echo $task['task_list_id']; ?></td>
                        <td><?php echo $task['task_name']; ?></td>
                        <td><?php echo $task['task_duration']; ?></td>
                        <td><?php echo $task['task_status']; ?></td>
                        <td>
                            <form action="TaskEdit.php?task_id=<?php echo $task['task_id']; ?>" method="post">
                                <button class="w3-button w3-red">+</button>
                            </form>
                        </td>
                        <td>
                            <form action="TaskDelete.php?task_id=<?php echo $task['task_id']; ?>" method="post">
                                <button class="w3-button w3-red">-</button>
                            </form>
                        </td>
                    </tr>
                <?php
                } ?>
        </table>
    </div>
    <form action="ListDelete.php?list_id=<?php echo $list['list_id']; ?>" method="post">
        <button class="w3-button w3-red">delete</button>
    </form>
</div>
<?php
include "include/footer.php";
?>