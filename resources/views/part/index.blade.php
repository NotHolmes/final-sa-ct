@extends('layouts.main')

@section('content')

    <div class="max-w-2xl mx-auto">

        <div class="relative overflow-x-hidden shadow-md sm:rounded-lg">
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
                        Update quantity
                    </th>
                    <th scope="col" class="p-4">
                        <a href="{{ route('parts.create') }}" class="text-xs text-blue-600 dark:text-blue-500 hover:underline">ADD NEW PARTS</a>
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
                        <form action="{{ route('parts.update', ['part' => $part]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <td class="px-6 py-4 text-right">
                            <input
                                required
                                type="text"
                                maxlength="3"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                name="p_quantity"
                                id="p_quantity"
                                placeholder="Update quantity"
                                class="w-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base text-xs text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            />
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button type="submit" class="border-0 font-medium text-blue-600 dark:text-blue-500 hover:underline"
                               onclick="this.style.display='none'"
                            >Confirm</button>
                        </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>

@endsection
