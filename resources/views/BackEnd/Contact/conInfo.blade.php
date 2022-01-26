<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-color: rgb(240, 236, 231);">
    <div class="container col-6 offset-3 shadow-lg">
        <div class="d-flex justify-content-end mt-5 mx-5">
            <h6 class="mt-2">Date: {{$mytime}}</h6>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <h4>{{$contact->subject}}</h4>
        </div>
        

        <div class=" d-flex justify-content-center mt-2 shadow-md">
            <textarea name="" id="" cols="80" rows="14" class="border border-1 mb-2 rounded-3">{{$contact->message}}</textarea>
        </div>

        <div class=" d-flex justify-content-end mt-2">
            <h5 class="mx-5">By: {{$contact->name}}</h5>
        </div>

        <div class=" d-flex justify-content-end mt-2">
            <h5 class="mx-5">{{$contact->phone}}</h5>
        </div>

    </div>
</body>

</html>