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

<body class="bg-gray-900 text-gray-50 flex justify-center">
   <div class="w-10/12 my-10 flex">
    <div class="w-5/12">
        <livewire:tickets />
    </div>
    <div class="w-7/12">
        <livewire:comments/>
    </div>

   </div>
    {{-- <livewire:comments  :comment='$comments'/>  --}}
    @livewireScripts()
</body>

</html>
