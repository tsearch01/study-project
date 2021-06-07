<?php
$performances = $data;
$file = __FILE__;
?>
<?php require APP_ROOT . '/Lib/view/includes/header.php';?>
    <main class="container">
<?php if($performances): ?>
    <div class="main-grid4-6 flex">
    <?php foreach($performances as $performance): ?>
        <div class="performance flex">
            <article>
                <a href="/study-project/performance/show/<?= $performance['id']?>">
                    <ul>
                        <li class="title"><span class="descriptor">Performance</span> <?=$performance['name']?></li>
                        <li><span class="descriptor">Venue:</span>
                            <?php if($performance['venue_id'] == 1){
                                echo 'Royal Festival Hall';
                            }else if($performance['venue_id'] == 2){
                                echo 'Barbican Hall';
                            }else if($performance['venue_id'] == 3){
                                echo 'Kings Place';
                            }?>
                        </li>
                        <li><span class="descriptor">Date:</span> <?=$performance['date']?></li>
                    </ul>
                </a>
            </article>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="main-grid8 flex addButton">
            <a href="/study-project/performance/edit/"><button><strong>+</strong> Performance</button></a>
        </div>
<?php endif; ?>
    </main>
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>


