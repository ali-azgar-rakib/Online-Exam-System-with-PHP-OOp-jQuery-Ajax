<?php include 'inc/header.php';
Session::checkSession();
?>
<div class="main">
    <h1>Welcome to Online Exam - Start Now</h1>
    <div style="width: 250px; float:left;"></div>
    <div class="starttest">
        <h2>Start Test</h2>
        <ul>
            <li>Total Question: <strong><?= $exam->getTotal() ?></strong></li>
            <li>1 mark for 1 right answer</li>
            <li><a href="test.php?q=1">Start Now...</a></li>
        </ul>
    </div>

</div>
<?php include 'inc/footer.php'; ?>