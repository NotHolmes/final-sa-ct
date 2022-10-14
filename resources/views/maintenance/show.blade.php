{{-- resources/views/maintenance/show.blade.php --}}
@extends('layouts.main')

@section('content')

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">From the blog</h1>

            <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">

                <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                    <p class="text-sm text-blue-500 uppercase">category</p>

                    <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white md:text-3xl">
                        All the features you want to know
                    </a>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure veritatis sint autem nesciunt,
                        laudantium quia tempore delect
                    </p>

                    <a href="#" class="inline-block mt-2 text-blue-500 underline hover:text-blue-400">Read more</a>

                    <div class="flex items-center mt-6">
                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1531590878845-12627191e687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="">

                        <div class="mx-4">
                            <h1 class="text-sm text-gray-700 dark:text-gray-200">Amelia. Anderson</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Lead Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <br>--}}
{{--    <article class="mx-8 ">--}}
{{--        <p>--}}
{{--            By {{ $complaint->anonymous ? "ไม่ระบุตัวตน" : $complaint->user->name }}--}}
{{--        </p>--}}

{{--        <div class="my-4 flex justify-center">--}}
{{--            @if(!is_null($complaint->image))--}}
{{--                <div class="relative ">--}}
{{--                    <a class="--}}
{{--                   h-48 w-96 absolute inset-0 z-10 bg-blue-100 text-center flex flex-col items-center--}}
{{--                    justify-center opacity-0 hover:opacity-100 bg-opacity-90 duration-300"--}}
{{--                       href="/images/complaints/{{$maintenance->image}}">--}}
{{--                        <h1  class=tracking-wider >คลิกเพื่อดูรูปเต็ม</h1>--}}
{{--                    </a>--}}
{{--                        <div class="flex content-center image-complaint">--}}
{{--                            <div class="back-white sm:max-w-xl sm:max-h-xl">--}}
{{--                                <h5 class="flex content-center image-complaint ">--}}
{{--                                    <img src="/images/complaints/{{$complaint->image}}" class="mx-auto" alt="">--}}
{{--                                </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <pre>--}}

{{--            </pre>--}}
{{--        </div>--}}

{{--       <br>--}}
{{--        <div class="my-4">--}}
{{--            สถานะ :--}}
{{--                <p class="bg-orange-100	 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">--}}
{{--                    <img src="/images/icons/status.jpg" width="25" height="25" alt="Logo fill-current text-gray-500"--}}
{{--                    class="inline mr-1" viewBox="0 0 16 16"/>--}}
{{--                    <a href="{{ route('statuses.show', ['status' => $complaint->status->name]) }}">--}}
{{--                        {{ $complaint->status->name }}--}}
{{--                    </a>--}}
{{--                </p>--}}


{{--        </div>--}}

{{--        <p class="text-gray-900 font-normal p-2 mb-8">--}}
{{--            {{ $complaint->description }}--}}
{{--        </p>--}}

{{--        @can('update', $complaint)--}}
{{--        <div class="relative py-4">--}}
{{--            <div class="absolute inset-0 flex items-center">--}}
{{--                <div class="w-full border-b border-gray-300"></div>--}}
{{--            </div>--}}
{{--            <div class="relative flex justify-center">--}}
{{--                <span class="bg-white px-4 text-sm text-gray-500"></span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        @can('updateComplaint', $complaint)--}}
{{--            <div>--}}
{{--                <a class="app-button" href="{{ route('maintenance.edit', ['complaint' => $complaint->id]) }}">--}}
{{--                    แก้ไขเรื่องร้องเรียน--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            @endcan--}}

{{--            @can('updateStatus', $complaint)--}}
{{--            <div class="relative z-0 py-6 w-full group">--}}
{{--            <form action="{{ route('maintenance.updateStatus', ['complaint' => $complaint]) }}" method="post">--}}
{{--            @csrf--}}
{{--            <!-- @method('PUT') -->--}}
{{--                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">--}}
{{--                    แก้ไขสถานะ--}}
{{--                </label>--}}
{{--                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
{{--                    @foreach($statuses as $status)--}}
{{--                        <option value="{{$status->id}}" @selected($complaint->status == $status)>{{ $status->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <button type="submit" class="app-button">ยืนยัน</button>--}}
{{--            </div>--}}
{{--</form>--}}

{{--            </div>--}}
{{--            @endcan--}}
{{--        @endcan--}}

{{--    </article>--}}
@endsection
