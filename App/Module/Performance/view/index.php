<?php

$performances = $data; 

?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<main>

<br>
<a href="/studyproject/performance/edit/">Create Performance</a>
<br>
<br>
    
    <?php if($performances): ?>
    <ul style="padding-left:0">
        <?php foreach($performances as $performance): ?>
        <li style="list-style-type:none">
            <article>
                <a href="/studyproject/performance/show/<?= $performance['id']?>"><h2>Performance <?=$performance['id']?></h2></a>
                <h>
                    <strong>Venue:</strong>
                    <?php if($performance['venue_id'] == 1){
                        echo 'Royal Festival Hall';
                    }else if($performance['venue_id'] == 2){
                        echo 'Barbican Hall';
                    }else if($performance['venue_id'] == 3){
                        echo 'Kings Place';
                    }?>
                 </h>
                <br>
                <h><strong>Date:</strong> <?=$performance['date']?></h>
            </article>
        </li>
        <br>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
    
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>

