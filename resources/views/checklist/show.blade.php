{{-- resources/views/maintenance/show.blade.php --}}
@extends('layouts.main')

@section('content')

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Room {{ $checklist->maintenance->resident->r_room_number }}</h1>

            <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                @if($checklist->maintenance->m_image !== null)
                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="/images/maintenance/{{$checklist->maintenance->m_image}}" alt="">
                @else
                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"alt="">
                @endif
                <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                    <p class="text-sm text-blue-500 uppercase">Checklist</p>

                    <p class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white md:text-3xl">
                        {{ $checklist->maintenance->resident->r_name }}
                    </p>

                    <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                        {{ $checklist->maintenance->m_detail }}
                    </p>

                    <div class="flex items-center mt-6">

                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://cdn4.iconfinder.com/data/icons/construction-flat-round-engineering/512/Residence-512.png" alt="">

                        <div class="mx-4">
                            <h1 class="text-sm text-gray-700 dark:text-gray-200">Requested by {{ $checklist->maintenance->resident->r_name }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $checklist->maintenance->updated_at }}</p>
                        </div>
                    </div>

                    <div class="flex items-center mt-6">

                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn0.iconfinder.com%2Fdata%2Ficons%2Fengineering-3%2F64%2Frepair-512.png&f=1&nofb=1&ipt=8a724f0303897788a8316b311b12e3132c8c6e9ee325503a119e0e833fc4a162&ipo=images" alt="">

                        <div class="mx-4">
                            <a href="{{ route('checklists.parts', ['checklist' => $checklist]) }}"><h1 class="text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 hover:underline">Parts</h1></a>
                        </div>
                    </div>
                    @if($checklist->status_id === 2)

                        <div class="flex items-center mt-6">

                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwebstockreview.net%2Fimages%2Fschedule-clipart-meeting-schedule-4.png&f=1&nofb=1&ipt=bc71207873012eb239d6252f9cabc93d574bc988746ff35ae59bb6de6595ab49&ipo=images" alt="">

                        </div>



                        <div class="flex items-center mt-6">
                            <form action="{{ route('checklists.update', ['checklist' => $checklist]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <label
                                        for="date"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                    >
                                        Date
                                    </label>
                                    <input
                                        type="date"
                                        name="date"
                                        id="date"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    />
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <label
                                        for="time"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                    >
                                        Time
                                    </label>
                                    <input
                                        type="time"
                                        name="time"
                                        id="time"
                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    />
                                </div>
                            </div>
                        </div>
                                    <button
                                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                        type="submit"
                                    >
                                        Schedule
                                    </button>

                            </form>

                        </div>

                    @endif

                    @if($checklist->status_id === 3)
                    <div class="flex items-center mt-6">

                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.onlygfx.com%2Fwp-content%2Fuploads%2F2017%2F12%2Fgrunge-yes-no-icon-1-902x1024.png&f=1&nofb=1&ipt=e2c63c0273b6abfd40e33d3958ec50bd6bdeb359d1bfc76001d76ba3de74f96d&ipo=images" alt="">

                        <div class="mx-4">
                            <a href="#"><h1 class="text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 hover:underline">Completed</h1></a>
                        </div>
                    </div>
                    <div class="flex items-center mt-6">

                        <img class="object-cover object-center w-10 h-10 rounded-full" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.onlygfx.com%2Fwp-content%2Fuploads%2F2017%2F12%2Fgrunge-yes-no-icon-8.png&f=1&nofb=1&ipt=91f726bf494f5e9763bf4556b66998a8cc00ceca83de9803ca6223ec9caa47da&ipo=images" alt="">

                        <div class="mx-4">
                            <a href="#"><h1 class="text-sm text-gray-700 dark:text-gray-200 hover:text-blue-600 hover:underline">Denied</h1></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
