<?php
$performances = $data;
$file = __FILE__;
?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<div class="main-box">
    <main>
        <?php if($performances): ?>
                <?php foreach($performances as $performance): ?>
                    <div class="performance">
                        <article>
                            <a href="/study-project/performance/show/<?= $performance['id']?>">
                                <ul>
                                    <li class="title"> Performance <?=$performance['name']?></li>
                                    <li> Venue:
                                        <?php if($performance['venue_id'] == 1){
                                            echo 'Royal Festival Hall';
                                        }else if($performance['venue_id'] == 2){
                                            echo 'Barbican Hall';
                                        }else if($performance['venue_id'] == 3){
                                            echo 'Kings Place';
                                        }?>
                                    </li>
                                    <li>Date: <?=$performance['date']?></li>
                                </ul>
                            </a>
                        </article>
                    </div>
                <?php endforeach; ?>
            <div class="addButton">
                <a href="/study-project/performance/edit/"><button><strong>+</strong> Performance</button></a>
            </div>
        <?php endif; ?>
    </main>
</div>

    
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>


