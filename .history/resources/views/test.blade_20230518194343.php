<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    {{-- {{ BsForm::open(['route' => route('employees.store')]) }} --}}
    {{ BsForm::text('username') }}
    {{-- {{ BsForm::close() }} --}}
</body>

</html>