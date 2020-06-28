<?php include 'inc/header.php';
Session::checkSession();
?>
<div class="main">
    <h1>Successfully finished you exam</h1>
    <div style="width: 250px; float:left;"></div>
    <div class="starttest">
        <h2>Exam result</h2>
        <ul>
            <li>Total number: <strong><?= Session::get('result') > 0 ? Session::get('result') : 0 ?></strong></li>
            <?php unset($_SESSION['result']); ?>

            <li><a href="result.php">See Result</a></li>
            <li><a href="starttest.php">Start Again...</a></li>
        </ul>
    </div>

</div>
<?php include 'inc/footer.php'; ?>