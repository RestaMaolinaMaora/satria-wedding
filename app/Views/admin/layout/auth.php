<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($title ?? 'Login') ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&family=Karma&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
  <main>
    <?= $this->renderSection('content') ?>
  </main>
</body>
</html>