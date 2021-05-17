<?php

$performance = $data;

?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<main>
<?php if($performance): ?>
        <ul style="padding-left:0">
            <li style="list-style-type:none">
                <article>
                    <h2>Performance <?= $performance[0]['id'] ?><h2>
                    <!--Additional index derefernece operator required as array is accessed directly not through foreach.-->
                    <h4><strong>Venue: </strong><?=$performance[0]['venue_id']?></h4>
                    <h4><strong>Date: </strong><?=$performance[0]['date']?></h4>
                    <h3><strong>Programme: </strong><?= $performance[0]['programme_id']?></h3>
                    <a href="/studyproject/performance/edit/<?= $performance[0]['id']?>">edit</a>
                    <br>
                    <a href="/studyproject/performance/delete/<?= $performance[0]['id']?>">delete</a>
                    <br>
                    <h class="nav-item">Further information on all music available <a href="https://nathanjamesdearden.com/music">here</a></h>
                </article>    
            </li>
        </ul>
    <?php endif; ?>

    <?php require APP_ROOT . '/Lib/view/includes/footer.php';?>