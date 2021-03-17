<?php
include "datalayer.php";
$data = GetAllLists($_GET["list_id"]);
$lists = GetAllLists();
include "include/header.php";
?>
<!-- First Grid -->
<form action="TaskAdd.php?list_id=" method="post">
    <button class="w3-button w3-green">Add a Task</button>
</form>
<?php foreach ($lists as $list) {
?>
    <div class="list_name">
        <h2> <?php echo $list['list_name']; ?> </h2>
        <form action="ListEdit.php?list_id=<?php echo $list['list_id']; ?>" method="post">
                <button class="btn btn-outline-danger">Edit</button>
            </form>
        <form action="ListDelete.php?list_id=<?php echo $list['list_id']; ?>" method="post">
            <button class="btn btn-outline-danger">Delete</button>
        </form>
        <form action="List.php?list_id=<?php echo $list['list_id']; ?>" method="post">
            <button class="btn btn-outline-danger">List</button>
        </form>
    </div>
<?php } ?>

<?php
include "include/footer.php";
?>