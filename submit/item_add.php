<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="item_write.php" method="post" enctype="multipart/form-data">
        <table>
            <tr><th><label for="item_id">Item ID</label></th><td><input type="text" id="item_id" name="item_id" disabled></td></tr>
            <tr><th>Item Name</th><td><input type="text" id="item_name" name="item_name"></td></tr>
            <tr><th>Description</th><td><input type="text" id="item_desc"  name="item_desc"></td></tr>
            <tr><th>Image</th><td><input type="file" name="upload_image"></td></tr>
        </table>
        <br>

        <input type="submit" value="submit">
    </form>
    
</body>

<script>



</script>
</html>

