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

    

</x-guest-layout>
