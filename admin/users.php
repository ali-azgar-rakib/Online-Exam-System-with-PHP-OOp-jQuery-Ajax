<?php
require_once('inc/header.php');
require_once('../classes/User.php');
$user = new User();
$allData = $user->getUserData();

// for disable 
if (isset($_GET['disable'])) {
    $diaId = (int) $_GET['disable'];
    $diResponse = $user->userDisabled($diaId);
}


// for enable 
if (isset($_GET['enable'])) {
    $enaId = (int) $_GET['enable'];
    $enaResponse = $user->userEnable($enaId);
}

// for enable 
if (isset($_GET['rem'])) {
    $remId = (int) $_GET['rem'];
    $remResponse = $user->userDelete($remId);
}


?>
<div>
    <!-- message for disable  -->
    <?= isset($diResponse) ? $diResponse : '' ?>
    <?= isset($diResponse) ? $diResponse = '' : '' ?>

    <!-- message for enable  -->
    <?= isset($enaResponse) ? $enaResponse : '' ?>
    <?= isset($enaResponse) ? $enaResponse = '' : '' ?>

    <!-- message for delete  -->
    <?= isset($remResponse) ? $remResponse : '' ?>
    <?= isset($remResponse) ? $remResponse = '' : '' ?>

    <table class='tblone'>
        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Email</th>
            <th>Current Status</th>
            <th>Action</th>
        </tr>
        <?php
        $serial = 1;
        foreach ($allData as $userData) {
        ?>
            <tr style="<?= $userData['status'] == 0 ? 'color:red;' : '' ?>">
                <td><?= $serial++ ?></td>
                <td><?= $userData['name'] ?></td>
                <td><?= $userData['email'] ?></td>
                <td><?= $userData['status'] == 0 ? 'Disable' : 'Enable' ?></td>
                <td>
                    <?php if ($userData['status'] == 0) { ?>
                        <a onclick="return confirm('are you sure to enable ?')" href="?enable=<?= $userData['id'] ?>">Enable</a>
                    <?php } else { ?>
                        <a onclick="return confirm('are you sure to disabled ?')" href="?disable=<?= $userData['id'] ?>">Disable</a>
                    <?php } ?>
                    || <a onclick="return confirm('are you sure to delete ?')" href="?rem=<?= $userData['id'] ?>">Remove</a>
                </td>
            </tr>
            <!-- end foreach bracket  -->
        <?php } ?>

    </table>
</div>




</div>
<?php include 'inc/footer.php'; ?>