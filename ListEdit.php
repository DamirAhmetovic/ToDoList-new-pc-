<?php
include "datalayer.php";
$AllLists = GetSpecificList($_GET["list_id"]);
require "ListEditCheckInput.php";
include "include/header.php";
?>

<!-- First Grid -->
<div class="w3-container w3-red">
    <h2>Edit list</h2>
</div>
<div class="w3-row-padding w3-padding-64 w3-container">
    <form class="w3-container" method="post" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
        <label class="w3-text-red"><b> list name</b></label>
        <input type="text" class="w3-input w3-border w3-light-grey" name="list_name" value="<?  echo $AllLists[" list_name"] ?>">
        <span class="error"> <?php echo $list_nameErr; ?></span>
        <button type="submit" class="w3-btn w3-blue-grey">edit task</button>
    </form>
</div>


<?php
include "include/footer.php";
?>