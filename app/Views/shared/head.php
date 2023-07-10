<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $meta_title = esc($item->title ?? $title ?? 'Template') ?></title>
    <meta name="description" content="<?= $meta_desc = esc($item->description ?? $description ?? 'Awesome Description') ?>">
    <meta name="og:title" content="<?= $meta_title ?>" />
    <meta name="og:description" content="<?= $meta_desc ?>" />
    <meta name="og:image" content="<?= esc($item->image_url ?? '') ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="theme-color" content="#4285f4">

    <link rel="manifest" href="/manifest.webmanifest">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.41.0/lib/codemirror.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
    <link rel="stylesheet" href="/style.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.0/js/OverlayScrollbars.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/codemirror@5.58.3/lib/codemirror.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/codemirror@5.58.3/mode/xml/xml.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script defer src="https://code.highcharts.com/highcharts.js"></script>
    <script defer src="https://code.highcharts.com/modules/exporting.js"></script>
    <script defer src="https://code.highcharts.com/modules/export-data.js"></script>

</head>