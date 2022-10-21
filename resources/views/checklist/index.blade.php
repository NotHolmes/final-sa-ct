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
                        SCHEDULED TIME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        STATUS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($checklists as $checklist)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $checklist->maintenance->resident->r_room_number }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $checklist->maintenance->resident->r_name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('maintenances.show', ['maintenance' => $checklist->maintenance]) }}" class="hover:text-blue-600 hover:dark:text-blue-500 hover:underline">
                                {{ substr($checklist->maintenance->m_detail, 0, 7) }}...
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            @if($checklist->c_datetime !== null)
                                {{ date('y-m-d H:i', strtotime($checklist->c_datetime)) }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            {{ $checklist->status->name }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('checklists.show', ['checklist' => $checklist]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
                {{--                <tr--}}
                {{--                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
                {{--                    <td class="w-4 p-4">--}}
                {{--                    </td>--}}
                {{--                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">--}}
                {{--                        Microsoft Surface Pro--}}
                {{--                    </th>--}}
                {{--                    <td class="px-6 py-4">--}}
                {{--                        White--}}
                {{--                    </td>--}}
                {{--                    <td class="px-6 py-4">--}}
                {{--                        Laptop PC--}}
                {{--                    </td>--}}
                {{--                    <td class="px-6 py-4">--}}
                {{--                        $1999--}}
                {{--                    </td>--}}
                {{--                    <td class="px-6 py-4 text-right">--}}
                {{--                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
                {{--                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">--}}
                {{--                    <td class="w-4 p-4">--}}
                {{--                    </td>--}}
                {{--                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">--}}
                {{--                        Magic Mouse 2--}}
                {{--                    </th>--}}
                {{--                    <td class="px-6 py-4">--}}
                {{--                        Black--}}
                {{--                    </td>--}}
                {{--                    <td class="px-6 py-4">--}}
                {{--                        Accessories--}}
                {{--                    </td>--}}
                {{--                    <td class="px-6 py-4">--}}
                {{--                        $99--}}
                {{--                    </td>--}}
                {{--                    <td class="px-6 py-4 text-right">--}}
                {{--                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>--}}
                {{--                    </td>--}}
                {{--                </tr>--}}
                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>

@endsection
