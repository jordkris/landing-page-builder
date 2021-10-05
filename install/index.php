<!DOCTYPE html>
<html>


<head>
    <title>Instalation Form</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./webox-logo.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">

</head>

<body class="bg_general">
    <!-- <pre class="text_black"><?= print_r($_SERVER); ?></pre> -->
    <?php
    // $path = '['.$_SERVER['SERVER_ADDR'].']'.$_SERVER['REQUEST_URI'].'config.json';
    $path = __DIR__ . '/config.json';
    if (!file_exists($path)) {
        // echo "false" . '<br />';
        // echo __DIR__ . '<br />';
        // echo $path . '<br />';
    } else {
        header('Location: ..');
    }
    ?>
    <div class="main-block">
        <div class="left-part">
            <img src="./webox-logo.png" class="img-logo">
            <h1 class="text_black">Webox Builder</h1>
            <p class="text_black" style="width: 547px; text-align:justify;">Selamat datang di halaman setup/isntalasi. Silahkan lengkapi isian dan informasi di bawah ini dan Anda akan segera bisa merasakan pengalaman membuat landingpage dengan sangat mudah dan cepat, sesuai kebutuhan bisnis atau produk anda.</p>
        </div>
        <form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>process/index.php">
            <div class="row">
                <div class="col-lg-6">
                    <div class="title">
                        <h2 class="text-center">Informasi database</h2>
                        <p>Silahkan lengkapi data di bawah ini.</p>
                    </div>
                    <div class="info">
                        <label>Connection Status : <span id="db_status" class="btn btn-dark"><i class="fas fa-times text-white"></i></span></label>
                        <label>Database Name</label>
                        <input type="text" id="db_name" name="db_name" placeholder="web_db" required>
                        <label>Database Username</label>
                        <input type="text" id="db_username" name="db_username" placeholder="username">
                        <label>Database Password</label>
                        <input type="password" id="db_password" name="db_password" placeholder="password">
                        <label>Database Host</label>
                        <input type="text" id="db_host" name="db_host" placeholder="localhost" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="title">
                        <h2 class="text-center">Informasi website</h2>
                        <p>Silahkan lengkapi data di bawah ini.</p>
                    </div>
                    <div class="info">
                        <label>Url Status : <span id="url_status" class="btn btn-dark"><i class="fas fa-times text-white"></i></span></label>
                        <label>Nama Domain / Url</label>
                        <input id="url" type="text" name="url" placeholder="https://websitesaya.com/" required>
                        <small style="color:red;">*diakhiri tanda slash "/" *diawali http atau https</small>
                        <label>Username Admin</label>
                        <input type="text" name="admin_username" placeholder="admin" required>
                        <label>Password</label>
                        <input type="password" name="admin_password" placeholder="password123" required>
                        <label>Email Admin</label>
                        <input type="email" name="admin_email" placeholder="admin@websitesaya.com" required>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <button id="submitButton" type="submit" class="btn btn-success" disabled>
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>