<x-app-layout>

    <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-10 mt-5">
        Pré-Cadastro de Dependentes
    </h2>

    <form method="POST" action="{{ route('dependents.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="ml-10 mt-5">
                <div class="mt-5 mr-10 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div class="md:col-span-1">
                                <div class="px-4 sm:px-0">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                        IDENTIFICAÇÃO DO DEPENDENTE
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Preencha corretamente os dados do formulário. Estes dados serão
                                        usados na confecção da carteira do dependente.
                                    </p>
                                </div>
                            </div>


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
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="rg" class="block text-sm font-medium text-gray-700">
                                        RG
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="number" name="rg" id="rg"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300
                                            @error('rg') bg-red-700 text-white @enderror"
                                            value="{{ old('rg') }}" />
                                    </div>
                                    @error('rg')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="birth" class="block text-sm font-medium text-gray-700">
                                        DATA DE NASCIMENTO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="date" name="birth" id="birth" required
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm border-gray-300 
                                        @error('birth') bg-red-700 text-white @enderror"
                                            value="{{ old('birth') }}" />
                                    </div>
                                    @error('birth')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="cnpj" class="block text-sm font-medium text-gray-700">
                                        PARENTESCO
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <select required class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" name="kindship_id" id="kindship_id">
                                            @foreach ($kindships as $kindship)
                                            <option value="{{$kindship->id}}">{{$kindship->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('cnpj')
                                        <div class="text-red-600 w-full">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-2">
                                    <label for="document_pagamento"
                                        class="block text-sm font-medium text-gray-700">
                                        COMPROVANTE DE PAGAMENTO DA TAXA DE EMISSÃO DA CARTEIRA
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="file" accept=".pdf, .png, .jpg, .jpeg, .gif"
                                            name="document_pagamento" id="document_pagamento"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-1 sm:col-span-2">
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <p>
                                            <b>Ao informar meus dados e clicar no botão 'Enviar Solicitação de Inclusão de Dependente'
                                                eu:</b><br />
                                            1) declaro que TODAS as informações acima prestadas são verdadeiras, e
                                            assumo a inteira responsabilidade pelas mesmas.<br />
                                            2) informo que estou ciente que a inveracidade deste preenchimento configura
                                            crime previsto no Código Penal Brasileiro, passível de apuração na forma da
                                            Lei.<br />
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
                Enviar Solicitação de Inclusão de Dependente
            </button>
        </div>

    </form>

</x-app-layout>