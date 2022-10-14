{{-- resources/views/maintenance/index.blade.php --}}
@extends('layouts.main')

@section('content')

    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">การซ่อมที่ได้รับแจ้ง</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                            How to use sticky note for problem solving
                        </a>

                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                    </div>
                </div>

                @foreach($maintenances as $maintenance)
                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="{{ route('maintenance.show', ['maintenance' => $maintenance->id]) }}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                {{ $maintenance->detail }}
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>
                        </div>
                    </div>

                @endforeach



                {{--        <div class="horizontal bg-black my-1 px-8 py-2 flex flex-wrap justify-between space-y-6 ">--}}
                {{--            <br>--}}
                {{--            @foreach($maintenance as $complaint)--}}

                {{--                <a href="{{ route('maintenance.show', ['complaint' => $complaint->id]) }}"--}}
                {{--                   class="horizontal block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-emerald-100 hover:border-emerald-400 border-transparent border-2 hover:p-6">--}}
                {{--                   @if(!is_null($complaint->image))--}}
                {{--                        <div class="relative  ">--}}

                {{--                                <div class="flex content-center image-complaint ">--}}
                {{--                                    <img src="/images/maintenance/{{$complaint->image}}" class="mx-auto" alt="">--}}
                {{--                                </div>--}}
                {{--                        </div>--}}
                {{--                    @endif--}}

                {{--                    <div class="flex-content ">--}}
                {{--                        <div class="vertical">--}}
                {{--                            <div class="card activity-card back-white">--}}
                {{--                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">--}}
                {{--                                    {{ $complaint->title }}--}}
                {{--                                </h5>--}}
                {{--                            </div>--}}

                {{--                            <div class="card acivity-card back-white">--}}
                {{--                                <h5 class="mb-2 text-xl tracking-tight text-gray-900 ">--}}
                {{--                                    {{ $complaint->description }}--}}
                {{--                                </h5>--}}

                {{--                            </div>--}}

                {{--                            <div class="card activity-card back-white">--}}
                {{--                                <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">--}}
                {{--                                    <img src="/images/icons/status.jpg" width="25" height="25" alt="Logo fill-current text-gray-500"--}}
                {{--                                         class="inline mr-1" viewBox="0 0 16 16"/>--}}
                {{--                                    {{ $complaint->status->name }}--}}
                {{--                                </p>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </a>--}}


                {{--            @endforeach--}}

                {{--        </div>--}}




{{--                <div class="lg:flex">--}}
{{--                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">--}}

{{--                    <div class="flex flex-col justify-between py-6 lg:mx-6">--}}
{{--                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">--}}
{{--                            How to use sticky note for problem solving--}}
{{--                        </a>--}}

{{--                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="lg:flex">--}}
{{--                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1544654803-b69140b285a1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">--}}

{{--                    <div class="flex flex-col justify-between py-6 lg:mx-6">--}}
{{--                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">--}}
{{--                            Morning routine to boost your mood--}}
{{--                        </a>--}}

{{--                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 25 November 2020</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="lg:flex">--}}
{{--                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1530099486328-e021101a494a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1547&q=80" alt="">--}}

{{--                    <div class="flex flex-col justify-between py-6 lg:mx-6">--}}
{{--                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">--}}
{{--                            All the features you want to know--}}
{{--                        </a>--}}

{{--                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 30 September 2020</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="lg:flex">--}}
{{--                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1484&q=80" alt="">--}}

{{--                    <div class="flex flex-col justify-between py-6 lg:mx-6">--}}
{{--                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">--}}
{{--                            Minimal workspace for your inspirations--}}
{{--                        </a>--}}

{{--                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 13 October 2019</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="lg:flex">--}}
{{--                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1624996379697-f01d168b1a52?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">--}}

{{--                    <div class="flex flex-col justify-between py-6 lg:mx-6">--}}
{{--                        <a href="#" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">--}}
{{--                            What do you want to know about Blockchane--}}
{{--                        </a>--}}

{{--                        <span class="text-sm text-gray-500 dark:text-gray-300">On: 20 October 2019</span>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>


{{--    <section class="mx-8">--}}
{{--        <form style="text-align:center" class="d-flex content-center" role="search" action="/search" method="GET" name="search">--}}
{{--            <input class="form-control me-2 w-full" style="width:70%" type="text" placeholder="ค้นหา" aria-label="Search" name="search">--}}
{{--            <button class="example_a btn-outline-success"  type="submit">ค้นหา</button>--}}
{{--        </form>--}}

{{--        <h1 class="text-3xl mx-4 mt-6">--}}
{{--            เรื่องร้องเรียน--}}
{{--        </h1>--}}
{{--        <br>--}}

{{--        <div class="horizontal bg-black my-1 px-8 py-2 flex flex-wrap justify-between space-y-6 ">--}}
{{--            <br>--}}
{{--            @foreach($maintenance as $complaint)--}}

{{--                <a href="{{ route('maintenance.show', ['complaint' => $complaint->id]) }}"--}}
{{--                   class="horizontal block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-emerald-100 hover:border-emerald-400 border-transparent border-2 hover:p-6">--}}
{{--                   @if(!is_null($complaint->image))--}}
{{--                        <div class="relative  ">--}}

{{--                                <div class="flex content-center image-complaint ">--}}
{{--                                    <img src="/images/maintenance/{{$complaint->image}}" class="mx-auto" alt="">--}}
{{--                                </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <div class="flex-content ">--}}
{{--                        <div class="vertical">--}}
{{--                            <div class="card activity-card back-white">--}}
{{--                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">--}}
{{--                                    {{ $complaint->title }}--}}
{{--                                </h5>--}}
{{--                            </div>--}}

{{--                            <div class="card acivity-card back-white">--}}
{{--                                <h5 class="mb-2 text-xl tracking-tight text-gray-900 ">--}}
{{--                                    {{ $complaint->description }}--}}
{{--                                </h5>--}}

{{--                            </div>--}}

{{--                            <div class="card activity-card back-white">--}}
{{--                                <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">--}}
{{--                                    <img src="/images/icons/status.jpg" width="25" height="25" alt="Logo fill-current text-gray-500"--}}
{{--                                         class="inline mr-1" viewBox="0 0 16 16"/>--}}
{{--                                    {{ $complaint->status->name }}--}}
{{--                                </p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}


{{--            @endforeach--}}

{{--        </div>--}}
    </section>



@endsection
