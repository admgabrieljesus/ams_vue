<x-adm-layout>

    <div class="py-2">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h1>Associado</h1>
                <h2 class="mt-5"><b>Dados Pessoais</b></h2>
                {{-- @foreach ($associate->documents as $d)
            <div>{{ $d->type }}: {{ $d->number }}</div>
        @endforeach --}}
                <div>Nome: {{ $associate->name }} </div>
                <div>Matrícula: {{ $associate->code }} </div>
                <div>CPF: {{ $associate->cpf }} </div>
                <div>Data Nascimento: {{ date('d-m-Y', strtotime($associate->birth)) }} </div>
                <div>Idade: {{ calcAge($associate->birth) }} anos</div>
                <h2 class="mt-5"><b>Contatos</b></h2>
                @foreach ($associate->emails as $e)
                    <div>{{ $e->email }}</div>
                @endforeach

                @foreach ($associate->phones as $p)
                    <div>({{ $p->ddd }}) {{ $p->number }}</div>
                @endforeach

                <h2 class="mt-5"><b>Endereço</b></h2>
                @foreach ($associate->addresses as $a)
                    <div>{{ $a->address }} </div>
                    <div>Complemento: {{ $a->complement }} </div>
                    <div>Número: {{ $a->number }} </div>
                    <div>Bairro: {{ $a->district }} </div>
                    <div>Cidade: {{ $a->city }} </div>
                    <div>Estado: {{ $a->state }} </div>
                    <div>CEP: {{ $a->zipcode }} </div>
                @endforeach

            </div>
        </div>
    </div>
</x-adm-layout>

<?php
function calcAge($birth) {
    list($year, $month, $day) = explode('-', $birth);
    $today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    $birthday = mktime( 0, 0, 0, $month, $day, $year);
    return floor((((($today - $birthday) / 60) / 60) / 24) / 365.25);
}
?>