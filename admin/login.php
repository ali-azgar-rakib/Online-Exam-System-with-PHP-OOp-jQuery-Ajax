<?php
$filepath = realpath(dirname(__FILE__));
require_once($filepath . '/inc/loginheader.php');
require_once("../classes/Admin.php");

$admin = new Admin();
?>
<?php

if (isset($_POST['login'])) {
    $response = $admin->getAdminData($_POST);
}

?>

<div class="main">
    <h1>Admin Login</h1>
    <div class="adminlogin">
        <form action="" method="post">
            <table>
                <tr>
                    <td colspan="2">
                        <?= isset($response['notMatch']) ? $response['notMatch'] : '' ?>
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?= isset($response['email']) ? $response['email'] : '' ?>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" /></td>

                </tr>
                <tr>
                    <td colspan="2">
                        <?= isset($response['password']) ? $response['password'] : '' ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="login" value="Login" /></td>
                </tr>
            </table>
            </from>
    </div>
</div>
<?php include 'inc/footer.php'; ?>