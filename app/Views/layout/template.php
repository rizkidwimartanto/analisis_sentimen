<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <link rel="stylesheet" href="/assets/css/style_pages.css">

    <title><?= esc($judul); ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Analisis Sentimen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= esc($judul === 'Home') ? 'active' : '' ?>" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= esc($judul === 'Data Training') ? 'active' : '' ?>" href="/data_training">Data Training</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= esc($judul === 'Data Testing') ? 'active' : '' ?>" href="/data_testing">Data Testing</a>
                    </li>
                </ul>
                <?php if (logged_in()) : ?>
                    <a class="nav-link btn btn-danger text-light" href="/logout">Logout</a>
                <?php else : ?>
                    <a class="nav-link btn btn-danger text-light" href="/login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- <nav class="clearfix">
        <a href="" id="pull"></a>
        <ul class="clearfix">
            <li class="clearfix"><a class="clearfix" href="/">Home</a></li>
            <li class="clearfix"><a class="clearfix" href="/data_training">Data Training</a></li>
            <li class="clearfix"><a class="clearfix" href="/data_testing">Data Testing</a></li>
            <li class="clearfix"><a class="clearfix" href="/">Logout</a></li>
        </ul>
    </nav> -->
    <div class="container">
        <?= $this->renderSection('content'); ?>
    </div>

    <script src="/assets/js/script_pages.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>