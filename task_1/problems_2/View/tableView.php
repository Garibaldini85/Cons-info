<?php

try {
    require_once "Function/CsvReader.php";
    $csvFile = 'file.csv';
    $reader = new CsvReader($csvFile);
} catch (Exception $e) {
    echo "This was caught: " . $e->getMessage();
    exit;
}

if ($reader->error !== null) {
    ?>
    <div class="alert alert-danger text-center mt-4" role="alert">
        <p><?php echo $reader->getErrorString(); ?></p>
    </div>
    <?php
    return;
}

?>
    <h1>CSV Table</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <?php
            foreach ($reader->getCsvHeader() as $value) {
                echo "<th>{$value}</th>";
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($reader->next()) {
            echo "<tr>";
            foreach ($reader->getCsvItem() as $value) {
                echo "<td>{$value}</td>";
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
<?php
unset($reader);
