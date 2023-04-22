<x-guest-layout>

    <div class="ml-10 mt-5">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5">
           Validação e Confirmação do Cadastro de Conveniado(a)
        </h2>

        <div>

            <div>

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">

                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td colspan="2" >
                                    <p class="mt-5 text-blue-600">Dados Pessoais</p>
                                </td>
                            </tr>

                            <tr>
                                <td width='15%'>Nome/Razão Social: </td>
                                <td> {{ $partner->name }} </td>
                            </tr>
                            <tr>
                                <td>Nome Fantasia: </td>
                                <td> {{ $partner->fantasy }} </td>
                            </tr>
                            <tr>
                                <td>CPF: </td>
                                <td> {{ $partner->cpf }} </td>
                            </tr>
                            <tr>
                                <td>CNPJ: </td>
                                <td> {{ $partner->cnpj }} </td>
                            </tr>
                            <tr>
                                <td> {{ $partner->type_document }}: </td>
                                <td> {{ $partner->number_document }} </td>
                            </tr>


                            @foreach ($partner->emails as $e)
                                <tr>
                                    <td>Email: </td>
                                    <td> {{ $e->email }} </td>
                                </tr>
                            @endforeach

                            @foreach ($partner->phones as $p)
                                <tr>
                                    <td>Telefone: </td>
                                    <td> ({{ $p->ddd }}) {{ $p->number }} </td>
                                </tr>
                            @endforeach

                            @foreach ($partner->addresses as $a)
                                <tr>
                                    <td>Endereço: </td>
                                    <td> {{ $a->address }} </td>
                                </tr>
                                <tr>
                                    <td>Complemento: </td>
                                    <td> {{ $a->complement }} </td>
                                </tr>
                                <tr>
                                    <td>Número: </td>
                                    <td> {{ $a->number }} </td>
                                </tr>
                                <tr>
                                    <td>Bairro: </td>
                                    <td> {{ $a->district }} </td>
                                </tr>
                                <tr>
                                    <td>Cidade: </td>
                                    <td> {{ $a->city }} </td>
                                </tr>
                                <tr>
                                    <td>Estado: </td>
                                    <td> {{ $a->state }} </td>
                                </tr>
                                <tr>
                                    <td>CEP: </td>
                                    <td> {{ $a->zipcode }} </td>
                                </tr>
                            @endforeach

                            @if ($partner->responsible != null)
                                <p class="mt-5 text-blue-600">Responsável pelo Convênio</p>
                                <tr>
                                    <td></td>
                                    <td> {{ $partner->responsible->name }} </td>
                                </tr>
                                <tr>
                                    <td>CPF: </td>
                                    <td> {{ $partner->responsible->cpf }} </td>
                                </tr>
                                <tr>
                                    <td> {{ $partner->responsible->type_document }}:
                                    </td>
                                    <td> {{ $partner->responsible->number_document }}
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td colspan="2">
                                    <p class="mt-5 text-blue-600">Documentação</p>
                                </td>
                            </tr>
                            @foreach ($files as $f)
                                @php
                                    $name = explode('/', $f);
                                    $name = $name[3];
                                @endphp
                                <tr>
                                    <td colspan="2">
                                        <a target="_blank"
                                            href='{{ route('files.view', ['partners', $partner->id, $name]) }}'>
                                     {{ $name }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="ml-10 mt-5">
        <form method="POST" action="{{ route('partners.check') }}" enctype="multipart/form-data">
            @csrf
            <p>Se os dados acima e a documentação estiverem corretos, clique no botão 'Validar e Confirmar' para confirmar o cadastro e gerar um usuário com senha para o novo conveniado. <br>Se necessário, registre observações sobre este cadastro e/ou anexe o email de autorização de cadastro.</p>
            <input name="id" value="{{ $partner->id }}" type="hidden" />
            <label class="mt-2"  for=""><b>Observações</b></label>
            <br>
            <textarea class="mt-2" cols="80" rows="5" id="comment" name="comment"></textarea>
            <br>
            <label class="mt-2"  for=""><b>Email de Autorização (para cadastros com documentação incompleta)</b></label>
            <br>
            <input type="file" required accept=".pdf, .png, .jpg, .jpeg, .gif"
            name="document_autorizacao" id="document_autorizacao"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  w-full rounded-none rounded-r-md sm:text-sm  border-gray-300" />
            <br>
            <button type="submit"
                class="mt-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Validar e Confirmar
            </button>
        </form>
    </div>

</x-guest-layout>
