<h2>Contact Us</h2>
<form action="Function/saveNewRecord.php" method="post" enctype="multipart/form-data">
    <div class="form-group mt-4">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group mt-4">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group mt-4">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>
    <div class="form-group mt-4">
        <label for="file">File:</label>
        <input type="file" class="form-control-file" id="file" name="file" accept=".jpg, .jpeg, .png">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>
