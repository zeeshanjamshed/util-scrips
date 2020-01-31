<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Text Files</title>
</head>
<body>
    <h2>Sales Invoices</h2>
    <form method="POST" action="{{ route('text-files-post') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Submit</button>
    </form>
    <hr>
    <h2>COA</h2>
    <form method="POST" action="{{ route('text-files-post2') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file1">
    <input type="file" name="file2">
    <button type="submit">Submit</button>
    </form>
    <hr>
    <h2>Inventory</h2>
    <form method="POST" action="{{ route('text-files-post3') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Submit</button>
    </form>
</body>
</html>