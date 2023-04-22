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
    <x-jet-banner />
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
            <a target="_blank" href="https://aepetba.org.br/v1/">
                <img style="width: 250px; height: 76px" alt="Site logo" src="{{ asset('images/logo-AEPETBA.png') }}">
            </a>
        </div>
        <div class="col-span-12 sm:col-span-6 text-center ml-5" style="color: rgb(5, 1, 75);">
            <p>VOCÊ ESTÁ NO AMBIENTE DO SISTEMA AMS AEPET-BA.</p>
            <p>CLIQUE NA LOGO PARA VOLTAR AO SITE DA AEPET BAHIA.</p>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100">

        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <div class="grid grid-cols-12 gap-4 content-center text-white" style="
        background-color: rgb(61, 144, 158);
        color: rgb(255, 255, 255);
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
        line-height: 50px;
        padding-top: 2px;
    ">
        <div class="col-span-5 ml-4">
            <a href="https://aepetba.org.br/v1/contato/" target="_blank">
                Todos os direitos reservados a AEPET BA. Desde 2022.
            </a>
        </div>

        <div class="col-span-6">
            <a href="mailto:ams.suporte@aepetba.org.br" target="_blank">Para suporte envie mensagem para
                ams.suporte@aepetba.org.br.</a>
        </div>

        <div class="col-span-1">
            <a class="inline-block align-middle " href="https://lubconsultoria.com.br/" target="_blank">
                <img class="right-0" src="https://lubconsultoria.com.br/by/by-lubconsultoria.png" />
            </a>
        </div>
    </div>

    @stack('modals')


    @livewireScripts
</body>

</html>
