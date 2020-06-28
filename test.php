<?php
require_once 'inc/header.php';
Session::checkSession();
if (isset($_GET['q'])) {
	$number   = (int) $_GET['q'];
	$question = $exam->getQuestionByNum($number);
	$answers   = $exam->getAnswerByQ($number);
	if (isset($_POST['submit'])) {
		$next_page = $process->nextPage($_POST);
	}
}


?>
<div class="main">
    <h1>Question <?= $question['qno'] ?> of <?= $exam->getTotal() ?> </h1>
    <div class="test">
        <?= isset($next_page) ? $next_page : '' ?>
        <form method="post" action="">
            <table>
                <tr>
                    <td colspan="2">
                        <h3>Que <?= $question['qno'] ?>: <?= $question['title'] ?></h3>
                    </td>
                </tr>

                <?php
				foreach ($answers as $answer) {
				?>
                <tr>
                    <td>
                        <input name="answer" type="radio" value="<?= $answer['id'] ?>" /><?= $answer['answer'] ?>
                    </td>
                </tr>
                <?php } ?>

                <tr>
                    <td>
                        <input type="hidden" name="number" value="<?= $number ?>" />
                        <input type="hidden" name="total" value="<?= $exam->getTotal() ?>" />
                        <input type="submit" name="submit" value="Next Question" />
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>