<!-- PRESENTATION CODE -->
<!doctype HTML>
<html lang="eng">
<head>
    <meta charset ="utf-8">
    <title>Performance</title>

    <!--VENDOR CSS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">

    <!--CUSTOM CSS-->
    <link href="<?=CSS_ROOT?>/general.css" rel="stylesheet">
    <?php if (str_contains($file, "index")): ?>
    <link href="<?=CSS_ROOT?>/performance/index.css" rel="stylesheet">
<?php elseif (str_contains($file,"show")): ?>
    <link href="<?=CSS_ROOT?>/performance/show.css" rel="stylesheet">
<?php elseif (str_contains($file, "edit")): ?>
    <link href="<?=CSS_ROOT?>/performance/edit.css" rel="stylesheet">
<?php endif; ?>

</head>
<body>
    <div class="background">
        <header>
            <div class="container">
            <h1>Performances <span class="year">2021</span></h1>
                <nav>
                    <ul class="group">
                        <li class="nav-item"><a class="nav-link" href="/study-project/performance">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Log In</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
