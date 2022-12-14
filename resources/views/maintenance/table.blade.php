@extends('layouts.main')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ROOM NUMBER
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        DETAIL
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CREATED AT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($maintenances as $maintenance)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $maintenance->resident->r_room_number }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $maintenance->resident->r_name }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('maintenances.show', ['maintenance' => $maintenance]) }}" class="hover:text-blue-600 hover:dark:text-blue-500 hover:underline">{{ substr($maintenance->m_detail, 0, 7) }}...</a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $maintenance->created_at->format('Y M d') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('maintenances.accept', ['maintenance' => $maintenance]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="this.style.display='none'">Accept</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>

@endsection
