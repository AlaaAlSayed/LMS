<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="{{url('api/assignments/1/2030-6-20')}}" method="post" enctype="multipart/form-data">
<input type="file" name="input_image" id="input_image">

<input type="submit">
<a href="{{url('api/download/5')}}" >Download</a>
</form>
</body>
</html>
