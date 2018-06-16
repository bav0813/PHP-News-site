<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

@foreach ($news as $new)
{{$new->title}} {{$new->id}}<br>
@endforeach


</body>
</html>