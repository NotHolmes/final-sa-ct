@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl py-6">
            แก้ไขเรื่องร้องเรียน
        </h1>

        <form action="{{ route('complaints.update', ['complaint' => $complaint]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="relative z-0 mb-6 w-full group">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    หัวข้อร้องเรียน
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-500">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title', $complaint->title) }}"
                       placeholder="" required>
            </div>

            <!-- <div class="relative z-0 mb-6 w-full group">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    สถานะ
                </label>
                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}" @selected($complaint->status == $status)>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div> -->

            <div class="relative z-0 mb-6 w-full group">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    รายละเอียด
                </label>
                @if ($errors->has('description'))
                    <p class="text-red-500">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <textarea rows="4" type="text" name="description" id="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description', $complaint->description) }}</textarea>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Add image</label>
                    <input type="file" class="" name="image" id="image" accept=".jpg,.jpeg,.png">
                </div>
            </div>

            <div>
                <button class="app-button" type="submit">แก้ไขเรื่องร้องเรียน</button>
                <label for="anonymous" class="px-2">ไม่ระบุตัวตน</label>
                <input type="checkbox" name="anonymous" id="anonymous" @checked(old("anonymous", $complaint->anonymous))>
            </div>

        </form>
    </section>

    @can('delete', $complaint)
        <section class="mx-8 mt-16">
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-red-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-red-500">Danger Zone</span>
                </div>
            </div>

            <div>
                <h3 class="text-red-600 mb-4 text-2xl">
                    ลบเรื่องร้องเรียน
                    <p class="text-gray-800 text-xl">
                        Once you delete a complaint, there is no going back. Please be certain.
                    </p>
                </h3>

                <form action="{{ route('complaints.destroy', ['complaint' => $complaint->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="relative z-0 mb-6 w-full group">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Complaint Title to Delete
                        </label>
                        <input type="text" name="title" id="title"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="" required>
                    </div>
                    <button class="app-button red" type="submit">DELETE</button>
                </form>
            </div>
        </section>
    @endcan

@endsection
