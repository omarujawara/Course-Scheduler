<?php
    $title = "Course Schedule";
    require_once('./includes/top_layout.php');
?>
<div class="container">
    <p>Upload comma seperated file</p>
    <form action="./app/upload.php" method="post" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <button type="submit" name="upload" class="btn btn-primary">Submit</button>
    </form>
</div>
<div id="demo"></div>
<script src="./js/index.js"></script>
<?php require_once('./includes/bottom_layout.php')?>

