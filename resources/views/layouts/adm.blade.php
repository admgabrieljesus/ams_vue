<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <main>
            {{ $slot }}
        </main>
    </div>

    <div class="grid grid-cols-12 text-white" 
        style="background-color: rgb(61, 144, 158);
          border-bottom-color: rgba(0, 0, 0, 0.05);  
          border-bottom-style: solid;
          border-bottom-width: 1px;    
          box-sizing: border-box;    
          color: rgb(255, 255, 255);   
          font-family: Arial, Helvetica, sans-serif;
          font-size: 18px;    
          line-height: 26.05px;    
          min-height: 40px;    
          padding-top: 5px">

        <div class="col-span-12 sm:col-span-6 text-center">
            <span class="fa fa-comments-o"></span>
            <span> <a href="https://aepetba.org.br/v1/contato/" target="_blank">
                    Todos os direitos reservados a AEPET BA. Desde 2022.
                </a></span>
        </div>

        <div class="col-span-12 sm:col-span-2 text-center">
        </div>

        <div class="col-span-12 sm:col-span-2 text-center">
        </div>

        <div class="col-span-12 sm:col-span-2 text-center items-center">
            <span>
                <a href="https://lubconsultoria.com.br/" target="_blank">
                    <img src="https://lubconsultoria.com.br/by/by-lubconsultoria.png" alt="">
                </a>
            </span>
        </div>
    </div>

    @stack('modals')


    @livewireScripts
</body>

</html>
