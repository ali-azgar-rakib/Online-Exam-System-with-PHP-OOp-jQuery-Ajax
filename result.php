<?php
require_once 'inc/header.php';
Session::checkSession();

$questions = $exam->getQuesData();

?>
<div class="main">
    <h1>All Answer </h1>
    <div class="test">


        <table>
            <?php foreach ($questions as $question) { ?>
            <tr>
                <td colspan="2">
                    <h3>Que <?= $question['qno'] ?>: <?= $question['title'] ?></h3>
                </td>
            </tr>

            <?php
                $answers   = $exam->getAnswerByQ($question['qno']);
                foreach ($answers as $answer) {
                ?>
            <tr>
                <td>
                    <input name="answer" type="radio" /><span
                        <?= $answer['rightans'] == 1 ? "style='color:red;'" : '' ?>><?= $answer['answer'] ?></span>
                </td>
            </tr>
            <?php
                }
            }
            ?>



        </table>

    </div>
</div>
<?php include 'inc/footer.php'; ?>