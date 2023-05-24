<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .block {
            display: block;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .w-full {
            width: 100%
        }
    </style>
</head>

<body>
    {{ dump(session()) }}
    <x-form :action="route('employees.store')">
        <x-form-input name="last_name" label="Last Name" />
        <x-form-input name="first_name" label="First Name" />
        <x-form-submit>
            <span class="text-green-500">SAVE IT</span>
        </x-form-submit>
    </x-form>
</body>

</html>
