<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <x-form>
        @bind($user)
            <x-form-input name="last_name" label="Last Name" />
            <x-form-submit />
        @endbind
    </x-form>
</body>

</html>
