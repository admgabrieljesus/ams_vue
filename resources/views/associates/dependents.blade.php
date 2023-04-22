<x-app-layout>

    <div class="py-2">

        <div class="max-w-7xl mx-auto sm:px-1 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1 class="ml-1 mt-5 mb-5">Listagem de Dependentes de {{ $associate[0]->name }} - {{ $associate[0]->code }} </h1>

                <table class="mt-5 min-w-full divide-y divide-gray-200">
                    <tr>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matrícula</th>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Parentesco</th>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Nascimento</th>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Idade</th>
                        <th scope="col" class="px-1 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                    @foreach ($dependents as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $associate[0]->code }} - {{ $d->code }}</td>
                            <td>{{ $d->kindship->title }}</td>
                            <td>{{ $d->cpf }}</td>
                            <td>{{ date('d-m-Y', strtotime($d->birth)) }}</td>
                            <td>{{ calcAge($d->birth) }} anos</td>
                            <td>
                                <a target="_blank" alt="Carteira" href="{{ route('cards.show', $d['id'])}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M6 2h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4c0-1.1.9-2 2-2zm0 2v16h12V4H6zm6 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <a href="{{ route('dependents.create') }}" class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm mt-10">
                <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                  <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                </svg>
                Incluir Dependente
              </a>
        </div>
    </div>
</x-app-layout>

<?php
function calcAge($birth) {
    list($year, $month, $day) = explode('-', $birth);
    $today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    $birthday = mktime( 0, 0, 0, $month, $day, $year);
    return floor((((($today - $birthday) / 60) / 60) / 24) / 365.25);
}
?>
