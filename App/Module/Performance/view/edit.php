<?php
$performance = $data;
$file = __FILE__;
?>
<?php require APP_ROOT . '/Lib/view/includes/header.php';?>
    <main class="container">
        <div class="main-grid5 flex">
        <form action="/study-project/performance/update/" enctype="multipart/form-data" method="POST">
<?php if(isset($performance) && !(empty($performance['id']))): ?>
            <h2>Edit Performance id: <?=$performance['id']?></h2>
            <h2>Performance name: <?=$performance['name']?></h2>
<?php else: ?>
            <h2>New Performance</h2>
<?php endif; ?>

                <input id="performanceField" type="hidden" name="performance" value="<?= isset($performance)? $performance['id'] : "" ?>">
                <div id="performanceFieldError" class="error"><?= isset($performance['errorMessages']['id'])? $performance['errorMessages']['id']: ""?></div>

                <div class="venueField">
                    <label for="venueField">Venue: </label>
                    <input id="venueField" type="text" name="venue" placeholder="venue" value="<?= isset($performance)? $performance['venue_id']: "" ?>">
                    <div id="venueFieldError" class="error"><?= isset($performance['errorMessages']['venue_id'])? $performance['errorMessages']['venue_id']: ""?></div>
                </div>
                <div class="programmeField">
                    <label for="programmeField">Programme: </label>
                    <input id="programmeField" type="text" name="programme" placeholder="programme" value="<?= isset($performance)? $performance['programme_id']: "" ?>">
                    <div id="programmeFieldError" class="error"><?= isset($performance['errorMessages']['programme_id'])? $performance['errorMessages']['programme_id']: ""?></div>
                </div>
                <div class="dateField">
                    <label for="dateField">Date: </label>
                    <input id="dateField" type="datetime" name="date" placeholder="date" value="<?= isset($performance)? $performance['date']: "" ?>">
                    <div id="dateFieldError" class="error"><?= isset($performance['errorMessages']['date'])? $performance['errorMessages']['date']: ""?></div>
                </div>
                <div class="imageSelector">
                    <label for="imageSelector">Image: </label>
                    <input id="imageSelector" type="file" name="perf_img" accept="image/png, image/jpeg">
                    <div id="fileSelectorError" class="error"><?= isset($performance['errorMessages']['image'])? $performance['errorMessages']['image']: ""?></div>
                </div>
                <button id="performanceFormButton">Submit</button>
            </form>
        </div>
    </main>
<?php require APP_ROOT . '/Lib/view/includes/footer.php';?>