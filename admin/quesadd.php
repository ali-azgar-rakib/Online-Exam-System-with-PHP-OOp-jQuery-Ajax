<?php
require_once('inc/header.php');
require_once('../classes/Exam.php');
$exam = new Exam();
?>

<?php
$total = $exam->getTotal();

if (isset($_POST['submit'])) {
    $response = $exam->insertQuestion($_POST);
}

?>


<div class="main">
    <h1>Admin Panel-Add Question</h1>
    <?= isset($response) ? header("location: queslist.php") : '' ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="">Question N.</label></td>
                <td><input type="text" value="<?= $total + 1 ?>" name='qid' readonly></td>
            </tr>
            <tr>
                <td><label for="">Question</label></td>
                <td><input type="text" value="" name='qtitle'></td>
            </tr>
            <tr>
                <td><label for="">Choice One</label></td>
                <td><input type="text" value="" name='qone'></td>
            </tr>
            <tr>
                <td><label for="">Choice Two</label></td>
                <td><input type="text" value="" name='qtwo'></td>
            </tr>
            <tr>
                <td><label for="">Choice Three</label></td>
                <td><input type="text" value="" name='qthree'></td>
            </tr>
            <tr>
                <td><label for="">Choice Four</label></td>
                <td><input type="text" value="" name='qfour'></td>
            </tr>
            <tr>
                <td><label for="">Right Answer</label></td>
                <td><input type="text" value="" name='rans'></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add Question" name='submit'></td>
            </tr>






        </table>


    </form>




</div>
<?php include 'inc/footer.php'; ?>