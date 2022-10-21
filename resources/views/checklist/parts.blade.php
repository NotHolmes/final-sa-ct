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
                        NAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        QUANTITY
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LAST UPDATED
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{--                        <span class="sr-only">Edit</span>--}}
{{--                        <a href="{{ route('checklists.addParts') }}" class="text-xs text-blue-600 dark:text-blue-500 hover:underline">CONFIRM USE</a>--}}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($parts as $part)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            {{ $part->p_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $part->p_quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $part->updated_at->format('Y M d') }}
                        </td>
                        <td class="px-6 py-4 text-right">
{{--                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="this.style.display='none'">Accept</a>--}}
                            <input id="selected" aria-describedby="remember" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>

@endsection
