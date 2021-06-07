<?php
$performance = $data;
$file = __FILE__;

//Additional index derefernece operator required as array is accessed directly not through foreach.

?>
<?php require APP_ROOT . '/Lib/view/includes/header.php';?>
    <main class="container">
<?php if($performance): ?>
        <div class="main-grid5 flex">
            <article>
                <ul>
                    <li><h2>Performance: <?= $performance[0]['name'] ?></h2></li>
                    <li><h3><strong>Programme: </strong><?= $performance[0]['programme_id']?></h3></li>
                    <li><h3><strong>Venue: </strong> <?=$performance[0]['venue_id']?></h3></li>
                    <li><h3><strong>Date: </strong> <?=$performance[0]['date']?></h3></li>
                    <img src="<?=PERF_IMG_ROOT .  $performance[0]['image']?>" alt="image associated with performance">
                </ul>
            </article>
            <div class="buttons">
                <a href="/study-project/performance/edit/<?= $performance[0]['id']?>"><button>edit</button></a>
                <a href="/study-project/performance/delete/<?= $performance[0]['id']?>"><button>delete</button></a>
            </div>
            <h>Further information on all music available <a href="https://nathanjamesdearden.com/music">here</a></h>
        </div>
<?php endif; ?>
    </main>
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>