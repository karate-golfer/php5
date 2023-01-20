<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
    </style>
    <title>login</title>
</head>
<body class="text-center">
    <main class="form-signin">
        <form name="form1" action="login_act.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <?php if (isset($_GET['form_empty'])): ?>
            <p class="text-danger">ID,PWを確認してください。</p>
            <?php elseif (isset($_GET['form_validation'])): ?>
            <p class="text-danger">IDかPWに間違いがあります。</p>
            <?php elseif (isset($_GET['login_error'])): ?>
            <p class="text-danger">loginエラーです</p>
            <?php endif;?>
            <div class="form-floating">
                <input type="text" class="form-control" name="lid" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="lpw" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
</body>
</html>
