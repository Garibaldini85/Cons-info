<h1>Upload CSV</h1>
<form action="Function/upload.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="csvFile">Select CSV file to upload:</label>
        <input type="file" class="form-control-file" id="csvFile" name="csvFile" accept=".csv" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>