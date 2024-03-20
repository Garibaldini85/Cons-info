<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <?php include 'Form/uploadForm.php'; ?>
        </div>
        <div class="col-md-6 text-right">
            <?php include 'Form/downloadForm.php'; ?>
        </div>
    </div>

    <?php include 'View/tableView.php'; ?>

</div>
</body>
</html>