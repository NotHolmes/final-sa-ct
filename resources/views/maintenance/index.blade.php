{{-- resources/views/maintenance/index.blade.php --}}
@extends('layouts.main')

@section('content')

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Maintenances</h1>

            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach($maintenances as $maintenance)
                    <div class="lg:flex">
                        @if($maintenance->m_image !== null)
                            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="/images/maintenance/{{$maintenance->m_image}}" alt="">
                        @else
                            <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftestv1.demowebsitelinks.com%2FReal-Estate-Solution-LLC-v2%2Fwp-content%2Fuploads%2F2021%2F02%2FProperty-Maintenance.jpg&f=1&nofb=1&ipt=a4e1e48fcab3fb3b9898b238179c63bec2ab9616533a210da0d6bf86a7234246&ipo=images" alt="">
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
