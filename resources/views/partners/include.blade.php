<x-guest-layout>
    <h2 class="ml-10 mt-5 font-semibold text-xl text-gray-800 leading-tight">
        Solicitação de Cadastro de Conveniado
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <div>
                    <p class="mb-2 mr-2 text-lg">
                        Seja bem vindo ao cadastro de conveniados do sistema AMS/AEPET-BA!
                    </p>
                </div>

                <div>
                    <p class="mb-2 mr-2 text-lg">
                        Clique na opção conforme a categoria desejada e inicie o cadastro.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 items-center md:gap-4 mt-10 mb-10 ml-5 mr-5">
                    <div class="justify-self-center mb-5">
                        <a href="{{ route('partners.add', array('type' => 'doctors') ) }}" class="text-sm text-gray-700">
                            <img src="{{ asset('images/cadastro-medicos.png') }}" alt="Médicos(as) e Dentistas" />
                        </a>
                    </div>

                    <div class="justify-self-center mb-5">
                        <a href="{{ route('partners.add', array('type' => 'companies') ) }}" class="text-sm text-gray-700">
                            <img src="{{ asset('images/cadastro-clinicas.png') }}" alt="Clínicas" />
                        </a>
                    </div>

                    <div class="justify-self-center mb-5">
                        <a href="{{ route('partners.add', array('type' => 'radiologies') ) }}" class="text-sm text-gray-700">
                            <img src="{{ asset('images/cadastro-clinicas-imagem.png') }}" alt="Clínicas de Imagem" />
                        </a>
                    </div>

                    <div class="justify-self-center mb-5">
                        <a href="{{ route('partners.add', array('type' => 'laboratories') ) }}" class="text-sm text-gray-700">
                            <img src="{{ asset('images/cadastro-laboratorios.png') }}" alt="Laboratórios" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
