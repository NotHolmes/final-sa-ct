{{-- resources/views/maintenance/index.blade.php --}}
@extends('layouts.main')

@section('content')

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
                        @if($maintenance->m_image !== null)
                            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="/images/maintenance/{{$maintenance->m_image}}" alt="">
                        @else
                            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://images.unsplash.com/photo-1515378960530-7c0da6231fb1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
                        @endif

                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="{{ route('maintenances.show', ['maintenance' => $maintenance->id]) }}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                {{ $maintenance->m_detail }}
                            </a>

                            <span class="text-sm text-gray-500 dark:text-gray-300">On: {{ $maintenance->created_at->format('Y M d') }}</span>
                        </div>
                    </div>

                @endforeach

                </div>
            </div>
    </section>



@endsection
