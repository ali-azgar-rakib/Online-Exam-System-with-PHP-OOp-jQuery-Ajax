<?php
require_once('inc/header.php');
require_once('../classes/Exam.php');
$exam = new Exam();
$allData = $exam->getQuesData();

if (isset($_GET['rem'])) {
    $delId = (int) $_GET['rem'];
    $getResponse = $exam->deleteQuestion($delId);
}



?>
<div>
    <?= !empty(Session::get('delQ')) ? Session::get('delQ') : '' ?>

    <table class='tblone'>
        <tr>
            <th>Question No.</th>
            <th>Question</th>
            <th>Action</th>
        </tr>
        <?php
        if (!empty($allData)) {

            foreach ($allData as $qData) {
        ?>
                <tr>
                    <td><?= $qData['qno'] ?></td>
                    <td><?= $qData['title'] ?></td>
                    <td>
                        <a onclick="return confirm('are you sure to delete ?')" href="?rem=<?= $qData['id'] ?>">Remove</a>
                    </td>
                </tr>
                <!-- end foreach bracket  -->
        <?php
            }
        } else {
            echo "<td colspan='50'>No data to show</td>";
        }
        ?>

    </table>
</div>




</div>
<?php include 'inc/footer.php'; ?>