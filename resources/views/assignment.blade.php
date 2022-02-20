<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

   <embed src="{{asset('storage/assets/'.$assignment_pdf)}}"   alt="assignment pdf">
   <!-- //php artisan storage:link -->
   <img src="{{asset('storage/assets/'.$assignment_pdf)}}"   alt="personal photo">
   <a href="{{--route('files/download/1')--}}" >Download</a>

</body>
</html>