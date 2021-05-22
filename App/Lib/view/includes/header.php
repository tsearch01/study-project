<!-- PRESENTATION CODE -->
<!doctype HTML>
<html lang="eng">
<head>
    <meta charset ="utf-8">
    <title>Performance</title>

<!--VENDOR CSS STYLING-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <?php if (str_contains($file, "index")): ?>
        <link href="/study-project/public/includes/performance/css/index.css" rel="stylesheet">
    <?php elseif (str_contains($file,"show")): ?>
        <link href="/study-project/public/includes/performance/css/show.css" rel="stylesheet">
    <?php elseif (str_contains($file, "edit")): ?>
        <link href="/study-project/public/includes/performance/css/edit.css" rel="stylesheet">
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
