<!DOCTYPE html>
<html>
<head>
    <title>Email from Laravel API</title>
</head>
<body>
    <h1>Welcome:{{$user->name}}</h1>
    <p>This Email is from Laravel API</p>
    <h4>New product Created Successfully{{$data->name}} at {{$data->created_at}}</h4>
</body>
</html>
