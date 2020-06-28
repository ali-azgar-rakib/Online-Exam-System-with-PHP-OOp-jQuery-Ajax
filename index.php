<?php
require_once "inc/header.php";
Session::checkLogin();
?>
<div class="main">
    <h1>Online Exam System - User Login</h1>
    <div class="segment" style="margin-right:30px;">
        <img src="img/test.png" />
    </div>
    <div class="segment">
        <div style="display: none;" class='error' id='empty'>Filed shouldnot be empty</div>
        <div style="display: none;" class='error' id='not_matched'>Email or Password not matched</div>
        <div style="display: none;" class='error' id='deactive'>Your Account not active yet.Wait for activation</div>
        <form action="" method="post">
            <table class="tbl">
                <tr>
                    <td>Email</td>
                    <td><input id="email" type="text"></td>
                </tr>
                <tr>
                    <td>Password </td>
                    <td><input id="password" type="password"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" id="login" value="Login">
                    </td>
                </tr>
            </table>
        </form>
        <p>New User ? <a href="register.php">Signup</a> Free</p>
    </div>



</div>
<?php include 'inc/footer.php'; ?>