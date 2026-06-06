<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Admin Panel'; ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body class="bg-slate-100">

<div class="flex h-screen overflow-hidden">

    <?= $this->include('layouts/sidebar') ?>

    <div class="flex-1 flex flex-col overflow-hidden">

        <?= $this->include('layouts/topbar') ?>

        <main class="flex-1 overflow-y-auto p-8">
            <?= $this->renderSection('content') ?>
        </main>

    </div>

</div>
<style>

    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 999px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

</style>

</body>
</html>