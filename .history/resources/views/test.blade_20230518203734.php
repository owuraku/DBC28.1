<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <x-form :action="route('employees.store')">
        <x-form-input name="last_name" label="Last Name" class="mt-3" />
        <x-form-input name="first_name" label="First Name" />
        <x-form-submit />
    </x-form>
</body>

</html>