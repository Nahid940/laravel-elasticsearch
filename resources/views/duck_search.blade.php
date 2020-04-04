<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="get">
    <input type="text" name="key">
    <input type="submit" value="Search">
</form>
    <table style="width: 100%;border-collapse: collapse">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Color</th>
                <th>Gender</th>
                <th style="width: 200px">About</th>
                <th>Home Town</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($results))
                @foreach($results as $result)
                    <tr>
                        <td>{{$result->name}}</td>
                        <td>{{$result->age}}</td>
                        <td>{{$result->color}}</td>
                        <td>{{$result->gender}}</td>
                        <td>{{$result->about}}</td>
                        <td>{{$result->hometown}}</td>
                        <td>{{$result->registered}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>