<div class="block w-full overflow-x-auto">
    <table class="items-center bg-transparent w-full border-collapse">
        <thead>
            <tr>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                >
                    MATRÍCULA
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                >
                    ASSSOCIADO
                </th>
                <th
                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-sm uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                >
                    EMAIL
                </th>
            </tr>
        </thead>

        @foreach ($associates as $associate)
        <tbody>
            @foreach ($associate->emails as $email)
            <tr>
                <th
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-1 text-left text-blueGray-700"
                >
                    {{ $associate->code }}
                </th>
                <td
                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-1"
                >
                    {{ $associate->name }}
                </td>
                <td
                    class="border-t-0 px-6 align-center border-l-0 border-r-0 text-sm whitespace-nowrap p-1"
                >
                    {{ $email->email }}
                </td>
            </tr>
            @endforeach
        </tbody>
        @endforeach
    </table>
</div>