<x-guest-layout>

    <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10 mt-5">
        @if ( $type == 'doctors' )
            Pré-Cadastro de Conveniado(a) Pessoa Física (Médico(a) ou Dentista)
        @elseif ( $type == 'companies' )
            Pré-Cadastro de Conveniado(a) Pessoa Jurídica (Clínica Médica)
        @elseif ( $type == 'radiologies' )
            Pré-Cadastro de Conveniado(a) Pessoa Jurídica (Clínica de Radiologia)
        @elseif ( $type == 'laboratories' )
            Pré-Cadastro de Conveniado(a) Pessoa Jurídica (Laboatório)
        @else
            @php dd('erro') @endphp
        @endif
    </h2>

    <form method="POST" action="{{ route('partners.save') }}" enctype="multipart/form-data">
    @csrf
    <div class="ml-10 mt-5">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        IDENTIFICAÇÃO
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Preencha corretamente os dados do formulário. Estes dados serão
                        usados na confecção do contrato de convênio.
                    </p>
                </div>
            </div>

            <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        
                        <input name="type" id="type" type="hidden" value="{{ $type }}" />

                        @if ( $type == 'doctors')
                          
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        NOME COMPLETO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm border-gray-300 
                                            @error('name') bg-red-700 text-white @enderror"
                                            value="{{ old('name') }}" />
                                    </div>
                                    @error('name')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="cpf" class="block text-sm font-medium text-gray-700">
                                        CPF
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="cpf" id="cpf" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300
                                            @error('cpf') bg-red-700 text-white @enderror"
                                            value="{{ old('cpf') }}" />
                                    </div>
                                    @error('cpf')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-1">
                                    <label for="type_document" class="block text-sm font-medium text-gray-700">
                                        TIPO DE DOCUMENTO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <select name="type_document" id="type_document" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                        <option value="CREMEB">CREMEB</option>
                                        <option value="CROBA">CROBA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-1">
                                    <label for="number_document" class="block text-sm font-medium text-gray-700">
                                        NÚMERO CREMEB/CROBA
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="number_document" id="number_document" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                            value="{{ old('number_document') }}" />
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        RAZÃO SOCIAL
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm border-gray-300 
                                        @error('name') bg-red-700 text-white @enderror"
                                            value="{{ old('name') }}" />
                                    </div>
                                    @error('name')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="fantasy" class="block text-sm font-medium text-gray-700">
                                        NOME FANTASIA
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="fantasy" id="fantasy"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm border-gray-300 
                                        @error('fantasy') bg-red-700 text-white @enderror"
                                            value="{{ old('fantasy') }}" />
                                    </div>
                                    @error('fantasy')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="cnpj" class="block text-sm font-medium text-gray-700">
                                        CNPJ
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="cnpj" id="cpf" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300
                                        @error('cnpj') bg-red-700 text-white @enderror"
                                            value="{{ old('cnpj') }}" />
                                    </div>
                                    @error('cnpj')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>

        @if ( $type <> 'doctors')
            <div class="ml-10 mt-5">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                RESPONSÁVEL PELO CONVÊNIO
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Preencha corretamente os dados do responsável pelo convênio.
                                Estes dados serão usados na confecção do contrato de convênio.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-3">
                                        <label for="name_responsible" class="block text-sm font-medium text-gray-700">
                                            NOME COMPLETO
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="name_responsible" id="name_responsible" required
                                                class="
                                focus:ring-indigo-500 focus:border-indigo-500
                                flex-1
                                block
                                w-full
                                rounded-none rounded-r-md
                                sm:text-sm
                                border-gray-300  @error('name_responsible') bg-red-700 text-white @enderror"
                                                value="{{ old('name_responsible') }}" />
                                        </div>
                                        @error('name_responsible')
                                            <div class="text-red-600 w-full">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="cpf_responsible" class="block text-sm font-medium text-gray-700">
                                            CPF
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="number" name="cpf_responsible" id="cpf_responsible" required
                                                class="
                                focus:ring-indigo-500 focus:border-indigo-500
                                flex-1
                                block
                                w-full
                                rounded-none rounded-r-md
                                sm:text-sm
                                border-gray-300  @error('cpf_responsible') bg-red-700 text-white @enderror"
                                                value="{{ old('cpf_responsible') }}" />
                                        </div>
                                        @error('cpf_responsible')
                                            <div class="text-red-600 w-full">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="type_document" class="block text-sm font-medium text-gray-700">
                                            TIPO DE DOCUMENTO
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <select name="type_document" id="type_document" required
                                                class="
                                focus:ring-indigo-500 focus:border-indigo-500
                                flex-1
                                block
                                w-full
                                rounded-none rounded-r-md
                                sm:text-sm
                                border-gray-300
                                ">
                                                <option value="CREMEB">CREMEB</option>
                                                <option value="CROBA">CROBA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="number_document" class="block text-sm font-medium text-gray-700">
                                            NÚMERO CREMEB/CROBA
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="number_document" id="number_document" required
                                                class="
                                focus:ring-indigo-500 focus:border-indigo-500
                                flex-1
                                block
                                w-full
                                rounded-none rounded-r-md
                                sm:text-sm
                                border-gray-300  @error('number_document') bg-red-700 text-white @enderror"
                                                value="{{ old('number_document') }}" />
                                        </div>
                                        @error('number_document')
                                            <div class="text-red-600 w-full">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="ml-10 mt-5">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            ENDEREÇO
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Preencha corretamente o CEP, complemento e número. Os demais
                            dados serão recuperados de forma automática da base de dados.
                        </p>
                    </div>
                </div>

                <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-1">
                                    <label for="zipcode" class="block text-sm font-medium text-gray-700">
                                        CEP
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="zipcode" id="zipcode" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300 @error('zipcode') bg-red-700 text-white @enderror"
                                            value="{{ old('zipcode') }}" />
                                    </div>
                                    @error('zipcode')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-1">
                                    <label for="state" class="block text-sm font-medium text-gray-700">
                                        ESTADO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="state" id="state"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300 @error('state') bg-red-700 text-white @enderror"
                                            value="{{ old('state') }}" />
                                    </div>
                                    @error('state')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">
                                        CIDADE
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="city" id="city"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300  @error('city') bg-red-700 text-white @enderror"
                                            value="{{ old('city') }}" />
                                    </div>
                                    @error('city')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="district" class="block text-sm font-medium text-gray-700">
                                        BAIRRO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="district" id="district"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300  @error('district') bg-red-700 text-white @enderror"
                                            value="{{ old('district') }}" />
                                    </div>
                                    @error('district')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="address" class="block text-sm font-medium text-gray-700">
                                        ENDEREÇO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="address" id="address"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300 @error('address') bg-red-700 text-white @enderror"
                                            value="{{ old('address') }}" />
                                    </div>
                                    @error('address')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-1">
                                    <label for="number" class="block text-sm font-medium text-gray-700">
                                        NÚMERO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="number" id="number"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                            value="{{ old('number') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="complement" class="block text-sm font-medium text-gray-700">
                                        COMPLEMENTO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="complement" id="complement"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                            value="{{ old('complement') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ml-10 mt-5">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            DADOS DE CONTATO
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Informe telefone, email e website.
                        </p>
                    </div>
                </div>

                <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-1">
                                    <label for="ddd" class="block text-sm font-medium text-gray-700">
                                        DDD
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="ddd" id="ddd" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300 @error('ddd') bg-red-700 text-white @enderror"
                                            value="{{ old('ddd') }}" />
                                    </div>
                                    @error('ddd')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">
                                        TELEFONE
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="phone" id="phone"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300 @error('phone') bg-red-700 text-white @enderror"
                                            value="{{ old('phone') }}" />
                                    </div>
                                    @error('phone')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        EMAIL
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="email" id="email"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                            @error('email') bg-red-700 text-white @enderror"
                                            value="{{ old('email') }}" />
                                    </div>
                                    @error('email')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="website" class="block text-sm font-medium text-gray-700">
                                        WEBSITE
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="website" id="website"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                            value="{{ old('website') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="ml-10 mt-5">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            DOCUMENTAÇÃO E ESPECIALIDADES
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Faça o upload dos documentos exigidos e informe a(s) especialidade(s) que serão atendidas
                            pelo convênio.
                        </p>
                    </div>
                </div>

                <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="document_credenciamento"
                                        class="block text-sm font-medium text-gray-700">
                                        CREDENCIAMENTO AMS / APS PETROBRÁS
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
                                            name="document_credenciamento" id="document_credenciamento"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-4 gap-6">
                                <div class="col-span-2 sm:col-span-2">
                                    <label for="document_alvara" class="block text-sm font-medium text-gray-700">
                                        ALVARÁ DE FUNCIONAMENTO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif" name="document_alvara"
                                            id="document_alvara"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                    </div>
                                </div>
                            </div>


                            @if ( $type <> 'doctors')
                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_contrato" class="block text-sm font-medium text-gray-700">
                                            CONTRATO SOCIAL DA EMPRESA (com última atualização)
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif" name="document_contrato"
                                                id="document_contrato"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_identidade" class="block text-sm font-medium text-gray-700">
                                            IDENTIDADE DO RESPONSÁVEL TÉCNICO
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
                                                name="document_identidade" id="document_identidade"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_cpf" class="block text-sm font-medium text-gray-700">
                                            CPF DO RESPONSÁVEL TÉCNICO
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif" name="document_cpf"
                                                id="document_cpf"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_registro" class="block text-sm font-medium text-gray-700">
                                            REGISTRO NO CONSELHO REGIONAL DO RESPONSÁVEL TÉCNICO
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
                                                name="document_registro" id="document_registro"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ( $type == 'doctors')
                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_registro" class="block text-sm font-medium text-gray-700">
                                            REGISTRO NO CONSELHO REGIONAL
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
                                                name="document_registro" id="document_registro"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                                />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_certificado" class="block text-sm font-medium text-gray-700">
                                            CERTIFICADO(S) DA(S) ESPECIALIZAÇÃO(ÕES)
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
                                                name="document_certificado" id="document_certificado"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                                />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_identidade" class="block text-sm font-medium text-gray-700">
                                            IDENTIDADE
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
                                                name="document_identidade" id="document_identidade"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-4 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="document_cpf" class="block text-sm font-medium text-gray-700">
                                            CPF
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif" name="document_cpf"
                                                id="document_cpf"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="comment" class="block text-sm font-medium text-gray-700">
                                        LISTA DE ESPECIALIDADES QUE SERÃO ATENDIDAS POR ESTE CONVÊNIO
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <textarea 
                                                name="comment" id="comment"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" /></textarea>
                                        </div>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <p class="w-full">Infome apenas as especialidades que podem ser comprovadas pelo(s) certificado(s) de especialização(ões) enviado(s).<br/>
                                                Exemplo: Urologia, Cardiologia, Ortopedia, etc. 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ml-10 mt-5">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            TERMO DE CONSENTIMENTO DE USO DE DADOS E CONTRATO DE CONVÊNIO
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            Leia atentamente o Termo de Consentimento de Uso de Dados e o
                            Contrato de Convênio antes de finalizar o cadastro no sistema
                            AMS/AEPET-BA.
                        </p>
                    </div>
                </div>

                <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="document" class="block text-sm font-medium text-gray-700">

                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <p>
                                            <b>Ao informar meus dados e clicar no botão 'Enviar Solicitação de Cadastro'
                                            eu:</b><br />
                                            1) concordo com a <a target="_blank"
                                                href="https://www.aepetba.org.br/v1/politica-de-privacidade/"
                                                class="text-sm text-gray-700 underline">Política de Privacidade</a> e o
                                            <a target="_blank" href="{{ route('terms.view') }}"
                                                class="text-sm text-gray-700 underline">Termo de Consentimento da
                                                AEPET-BA</a>.<br />
                                            2) declaro que TODAS as informações acima prestadas são verdadeiras, e
                                            assumo a inteira responsabilidade pelas mesmas.<br />
                                            3) informo que estou ciente que a inveracidade deste preenchimento configura
                                            crime previsto no Código Penal Brasileiro, passível de apuração na forma da
                                            Lei.<br />
                                            4) aceito os <a target="_blank" href="{{ route('partners.contract', array('type'=>$type) ) }}"
                                                class="text-sm text-gray-700 underline">Termos do Contrato</a> e
                                            autorizo minha inclusão no convênio AMS/AEPET-BA.
                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enviar Solicitação de Cadastro
            </button>
        </div>

    </form>

</x-guest-layout>
