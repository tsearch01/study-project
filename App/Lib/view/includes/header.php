<!-- PRESENTATION CODE -->
<!doctype HTML>
<html lang="eng">
<head>
    <meta charset ="utf-8">
    <title>Performance</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php if (str_contains($file, "index")): ?>
        <link href="/study-project/public/includes/performance/css/index.css" rel="stylesheet">
    <?php elseif (str_contains($file,"show")): ?>
        <link href="/study-project/public/includes/performance/css/show.css" rel="stylesheet">
    <?php elseif (str_contains($file, "edit")): ?>
        <link href="/study-project/public/includes/performance/css/edit.css" rel="stylesheet">
    <?php endif; ?>

</head>
<body>
<div class="container">
    <header>
        <h1>Performances for the <?= date('Y');?> season<h1>
    </header>
    <nav>
        <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="/study-project/performance">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Log In</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        <ul>
    </nav>
