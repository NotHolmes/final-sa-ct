@extends('layouts.main')

@section('content')

{{--    create header and center it--}}
    <div class="row mb-6">
        <div class="col-md-12">
            <h1 class="text-center font-bold">Reports</h1>
            <h2 class="text-center">For the maintenance system in 2022</h2>
        </div>
    </div>

        <div class="max-w-2xl mx-auto">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Month
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Maintenance
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Checklist
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Finished Checklist
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Percent
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Percent</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $report)
                        <tr
                            class="bg-white border-none dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $report['month'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $report['maintenance'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $report['checklist'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $report['checklist_done'] }}
                            </td>
                            <td class="px-6 py-4">
{{--                                format percent 2 decimals--}}
                                {{ number_format($report['checklist_done_percent'], 2) }}%
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
        </div>

    @endsection

