<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Dashboard User' ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>

        body{
            font-family:'Inter',sans-serif;
            background:#dfe6ef;
            margin:0;
            padding:0;
            display:flex;
            justify-content:center;
        }

        .mobile{
            width:100%;
            max-width:430px;
            min-height:100vh;
            background:linear-gradient(to bottom,#ffffff,#f8fafc);
            position:relative;
            overflow:hidden;
        }

    </style>

</head>

<body>

    <div class="mobile">

        <?= $this->renderSection('content') ?>

    </div>

</body>

</html>