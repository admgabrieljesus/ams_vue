<x-guest-layout>
    <div class="mt-5">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Confirmação de Usuário</h1>
                <p>Confirme seus dados de associado para receber acesso ao sistema AMS/AEPET-BA.
                <p>
                <div>
                    
                    <form method="POST" action="{{ route('associates.confirm') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-3 gap-6 mt-5">
                            <div class="col-span-1 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Nome Completo (sem abreviações)
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name" required
                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300
                                        @error('name') bg-red-700 text-white @enderror"
                                        value="{{ old('name') }}" />
                                </div>
                                @error('name')
                                    <div class="text-red-600 w-full">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mt-5">
                            <div class="col-span-1 sm:col-span-2">
                                <label for="cpf" class="block text-sm font-medium text-gray-700">
                                    CPF (somente os números)
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

                        <div class="grid grid-cols-3 gap-6 mt-5">
                            <div class="col-span-1 sm:col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Email (apenas um email)
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="email" name="email" id="email" required
                                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300
                                        @error('email') bg-red-700 text-white @enderror"
                                        value="{{ old('email') }}" />
                                </div>
                                @error('email')
                                    <div class="text-red-600 w-full">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-6 mt-5">
                            <div class="col-span-1 sm:col-span-2">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Enviar Solicitação de Atualização Cadastral
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
