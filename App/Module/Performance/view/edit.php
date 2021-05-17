<?php
$performance = $data;
$file = __FILE__;
?>

<?php require APP_ROOT . '/Lib/view/includes/header.php';?>

<div class="container">
    <form action="/study-project/performance/update/" method="POST">
        <?php if(isset($performance) && !(empty($performance['id']))): ?>
            <h2>Edit Page: Performance <?=$performance['id']?></h2>
            <br>
        <?php else: ?>
            <h2>Create a New Performance Page</h2>
            <br>
        <?php endif; ?>

        <input id="performanceField" type="hidden" name="performance" value="<?= isset($performance)? $performance['id'] : "" ?>" >
        <div id="performanceFieldError" class="error"><?= isset($performance['errorMessages']['id'])? $performance['errorMessages']['id']: ""?></div>

        <label for="venueField">Venue: </label>
        <input id="venueField" type="text" name="venue" placeholder="venue" value="<?= isset($performance)? $performance['venue_id']: "" ?>" >
        <div id="venueFieldError" class="error"><?= isset($performance['errorMessages']['venue_id'])? $performance['errorMessages']['venue_id']: ""?></div>

        <label for="programmeField">Programme: </label>
        <input id="programmeField" type="text" name="programme" placeholder="programme" value="<?= isset($performance)? $performance['programme_id']: "" ?>">
        <div id="programmeFieldError" class="error"><?= isset($performance['errorMessages']['programme_id'])? $performance['errorMessages']['programme_id']: ""?></div>


        <label for="dateField">Date: </label>
        <input id="dateField" type="datetime" name="date" placeholder="date" value="<?= isset($performance)? $performance['date']: "" ?>" >
        <div id="dateFieldError" class="error"><?= isset($performance['errorMessages']['date'])? $performance['errorMessages']['date']: ""?></div>


        <button id="performanceFormButton">Submit</button>
    </form>
</div>

<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>