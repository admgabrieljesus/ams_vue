<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @livewireStyles

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>

    <div class="grid grid-cols-12 text-white" style="background-color: rgb(61, 144, 158);
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
                    FALE COM A DIRETORIA DA AEPET BAHIA
                </a></span>
        </div>

        <div class="col-span-12 sm:col-span-2 text-center">
            <span class="fa fa-phone"></span>
            <span>(71) 3012-4172</span>
        </div>

        <div class="col-span-12 sm:col-span-2 text-center">
            <span class="fa fa-whatsapp"></span>
            <span> <a target="_blank" href="https://api.whatsapp.com/send?phone=5571983568081&text=Ol%C3%A1,">
                    (71) 9 8356-8081
                </a></span>
        </div>

        <div class="col-span-12 sm:col-span-2 text-center">
            <span class="fa fa-envelope"></span>
            <span> <a href="mailto:bahia@aepet.org.br" target="_blank">
                    bahia@aepet.org.br
                </a></span>
        </div>
    </div>

    <div class="grid grid-cols-12 text-white" style=" 
                color: rgb(0, 0, 0);
                font-family: Arial, Helvetica, sans-serif;
                background-color: rgb(230, 230, 230);
                font-size: 16px;
              
                line-height: 26.05px;
                padding: 15px;">
        <div class="col-span-12 sm:col-span-6 text-center ml-5">
            <a  href="https://aepetba.org.br/v1/">
                <img style="width: 250px; height: 76px" src="{{ asset('images/logo-AEPETBA.png') }}">
            </a>
        </div>
        <div class="col-span-12 sm:col-span-6 text-center ml-5" style="color: rgb(5, 1, 75);">
            <p>VOCÊ ESTÁ NO AMBIENTE DO SISTEMA AMS AEPET-BA.</p>
            <p>CLIQUE NA LOGO PARA VOLTAR AO SITE DA AEPET BAHIA.</p>
        </div>
    </div>


    <div class="font-sans text-gray-900 antialiased ">
        <a href="{{ route('index') }}" class="ml-10 mt-2 mb-5">
            <img src="{{ asset('images/marca.jpeg') }}" class="w-4/12 ml-10" />
        </a>
        {{ $slot }}
    </div>

    @livewireScripts

</body>

</html>
