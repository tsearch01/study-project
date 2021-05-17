<?php
$performances = $data;
$file = __FILE__;
?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<main>
<br>
<a href="/study-project/performance/edit/">Create Performance</a>
<br>
<br>
<?php if($performances): ?>
    <div class="container">
        <?php foreach($performances as $performance): ?>
            <div class="row">
                <div class="col">
                    <article>
                        <header>
                            <a href="/study-project/performance/show/<?= $performance['id']?>">Performance <?=$performance['id']?></a>
                        </header>
                        <body>
                        <div>Venue:
                            <?php if($performance['venue_id'] == 1){
                                echo 'Royal Festival Hall';
                            }else if($performance['venue_id'] == 2){
                                echo 'Barbican Hall';
                            }else if($performance['venue_id'] == 3){
                                echo 'Kings Place';
                            }?>
                        </div>
                        <div>Date: <?=$performance['date']?></div>
                        </body>
                    </article>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
    
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>

