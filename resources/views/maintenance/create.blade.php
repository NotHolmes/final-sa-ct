@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl py-6">
            ส่งเรื่องร้องเรียน
        </h1>

        <form action="{{ route('maintenance.store') }}" method="post" enctype="multipart/form-data">
            @csrf

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
                       class="bg-gray-50 border @if($errors->has('title')) border-red-300 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    รายละเอียด
                </label>
                @if($errors->has('description'))
                    <p class="text-red-500">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <textarea rows="4" type="text" name="description" id="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description') }}</textarea>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">เพิ่มรูปภาพ</label>
                    <input type="file" class="" name="image" id="image" accept=".jpg,.jpeg,.png">
                </div>
            </div>

            <div>
                <button class="app-button" type="submit">ส่งเรื่องร้องเรียน</button>
                <input type="checkbox" name="anonymous" id="anonymous">
                <label for="anonymous" class="px-2">ไม่ระบุตัวตน</label>
            </div>

        </form>
    </section>

@endsection
