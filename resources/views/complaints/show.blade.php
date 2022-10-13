{{-- resources/views/complaints/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <br>
    <article class="mx-8 ">
        <h1 class="text-3xl mb-1 ">
            {{ $complaint->title }}
        </h1>

        <p>
            By {{ $complaint->anonymous ? "ไม่ระบุตัวตน" : $complaint->user->name }}
        </p>

        <div class="my-4 flex justify-center">
            @if(!is_null($complaint->image))
                <div class="relative ">
                    <a class="
                   h-48 w-96 absolute inset-0 z-10 bg-blue-100 text-center flex flex-col items-center
                    justify-center opacity-0 hover:opacity-100 bg-opacity-90 duration-300"
                       href="/images/complaints/{{$complaint->image}}">
                        <h1  class=tracking-wider >คลิกเพื่อดูรูปเต็ม</h1>
                    </a>
                        <div class="flex content-center image-complaint">
{{--                            <div class="back-white sm:max-w-xl sm:max-h-xl">--}}
                                <h5 class="flex content-center image-complaint ">
                                    <img src="/images/complaints/{{$complaint->image}}" class="mx-auto" alt="">
                                </h5>
{{--                            </div>--}}
                        </div>
                </div>
            @endif
            <pre>

            </pre>
        </div>

       <br>
        <div class="my-4">
            สถานะ :
                <p class="bg-orange-100	 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                    <img src="/images/icons/status.jpg" width="25" height="25" alt="Logo fill-current text-gray-500"
                    class="inline mr-1" viewBox="0 0 16 16"/>
                    <a href="{{ route('statuses.show', ['status' => $complaint->status->name]) }}">
                        {{ $complaint->status->name }}
                    </a>
                </p>


        </div>

        <p class="text-gray-900 font-normal p-2 mb-8">
            {{ $complaint->description }}
        </p>

        @can('update', $complaint)
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500"></span>
            </div>
        </div>

        @can('updateComplaint', $complaint)
            <div>
                <a class="app-button" href="{{ route('complaints.edit', ['complaint' => $complaint->id]) }}">
                    แก้ไขเรื่องร้องเรียน
                </a>
            </div>
            @endcan

            @can('updateStatus', $complaint)
            <div class="relative z-0 py-6 w-full group">
            <form action="{{ route('complaints.updateStatus', ['complaint' => $complaint]) }}" method="post">
            @csrf
            <!-- @method('PUT') -->
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    แก้ไขสถานะ
                </label>
                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($statuses as $status)
                        <option value="{{$status->id}}" @selected($complaint->status == $status)>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="app-button">ยืนยัน</button>
            </div>
</form>

            </div>
            @endcan
        @endcan

    </article>
@endsection
