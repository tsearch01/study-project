<?php
$performance = $data;
$file = __FILE__;

//Additional index derefernece operator required as array is accessed directly not through foreach.

?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<main>
    <?php if($performance): ?>
        <div class="container">
            <div class="performanceInfo">
                <article>
                    <ul class="group">
                        <li><h2>Performance: <?= $performance[0]['id'] ?></h2></li>
                        <li><h3><strong>Programme: </strong><?= $performance[0]['programme_id']?></h3></li>
                        <li><h3><strong>Venue: </strong> <?=$performance[0]['venue_id']?></h3></li>
                        <li><h3><strong>Date: </strong> <?=$performance[0]['date']?></h3></li>
                    </ul>
                </article>
            </div>
            <div class="performanceOptions">
                <div class="buttons">
                    <a href="/study-project/performance/edit/<?= $performance[0]['id']?>"><button>edit</button></a>
                    <a href="/study-project/performance/delete/<?= $performance[0]['id']?>"><button>delete</button></a>
                </div>
                <h class="nav-item">Further information on all music available <a href="https://nathanjamesdearden.com/music">here</a></h>
            </div>
        </div>
    <?php endif; ?>
</main>


<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>