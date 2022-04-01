<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Liveware Tutorial 👻</title>
</head>
@livewireStyles()

<body>

    <livewire:comments  />
    {{-- <livewire:comments  :comment='$comments'/>  --}}
    @livewireScripts()
</body>

</html>
