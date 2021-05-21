<?php
$performances = $data;
$file = __FILE__;
?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<div class="main-container">
    <main>
        <?php if($performances): ?>
        <div class="group row">
            <?php foreach($performances as $performance): ?>
            <div class="performance">
                <article>
                    <ul class="group">
                        <li> <a href="/study-project/performance/show/<?= $performance['id']?>">Performance <?=$performance['id']?></a></li>
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
                </article>
            </div>
            <?php endforeach; ?>
        </div>
            <a href="/study-project/performance/edit/">Create Performance</a>
        <?php endif; ?>
    </main>
</div>
    
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>


