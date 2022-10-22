{{-- resources/views/maintenance/show.blade.php --}}
@extends('layouts.main')

@section('content')

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Room {{ $maintenance->resident->r_room_number }}</h1>

            <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                @if($maintenance->m_image !== null)
                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="/images/maintenance/{{$maintenance->m_image}}" alt="">
                @else
                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">
                @endif
                <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                    <p class="text-sm text-blue-500 uppercase">Maintenance</p>
                    @if($maintenance->checklist == null)
                    <p class="text-sm text-gray-500 dark:text-gray-400">สถานะ : รอดำเนินการ</p>
                    @else
                        <p class="text-sm text-gray-500 dark:text-gray-400">สถานะ : {{ $maintenance->checklist->status->name }}</p>
                    @endif

                    <p class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white md:text-3xl">
                        {{ $maintenance->user->name }}
                    </p>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        {{ $maintenance->m_detail }}
                    </p>

                    <div class="flex items-center mt-6">

                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://cdn4.iconfinder.com/data/icons/construction-flat-round-engineering/512/Residence-512.png" alt="">

                        <div class="mx-4">
                            <h1 class="text-sm text-gray-700 dark:text-gray-200">Requested by {{ $maintenance->resident->r_name }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $maintenance->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
