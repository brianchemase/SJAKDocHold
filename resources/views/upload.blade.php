<!DOCTYPE html>
<html>
<head>
    <title>Upload a File</title>
</head>
<body>
    <h1>Upload a PDF File</h1>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">PDF File:</label>
        <input type="file" name="file" id="file" accept="application/pdf" required>
        <br>
        <label for="caption">Caption:</label>
        <input type="text" name="caption" id="caption" required>
        <br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
