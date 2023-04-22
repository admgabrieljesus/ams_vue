<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Associados') }}
        </h2>
    </x-slot>

    <div class="py-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matrícula</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Emails</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefones</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                    @php $color = '#CCC' @endphp
                    
                    @foreach ($associates as $p)
                        @php $color = $color=='#FFF' ? '#CCC' : '#FFF' @endphp
                        <tr style="background-color: {{ $color }}">
                            <td>
                                {{ $p->code }}
                            </td>

                            <td>
                                {{ $p->level_id==1 ? 'Ativo' : 'Aposentado' }}
                            </td>

                            <td>
                                {{ $p->name }}
                            </td>
                            
                            <td>
                                <table>
                                @if ( $p->emails <> null )
                                    @foreach ($p->emails as $e)
                                        <tr><td>{{ $e->email }}</td></tr>
                                    @endforeach
                                @endif
                                </table>
                            </td>

                            <td>
                                <table>
                                @if ( $p->phones <> null )
                                    @foreach ($p->phones as $t)
                                        <tr><td>({{ $t->ddd  }}) {{ $t->number  }}</td></tr>
                                    @endforeach
                                @endif
                                </table>
                            </td>
                            <td>
                                <a target="_blank" alt="Detalhes" href="{{ route('associates.show', $p['id'])}}">
                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/></svg>
                                </a>
                                <a target="_blank" href="{{ route('associates.edit', $p['id'])}}">
                                    <svg style="display: inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/></svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>

                </table>
                {{ $associates->links() }}
            </div>
        </div>
    </div>

</x-app-layout>