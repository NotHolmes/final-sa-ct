{{-- resources/views/statuses/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            สถานะ : {{ $status->name }}
        </h1>
        <p class="mx-8">
            จำนวนเรื่องร้องเรียน : {{ $status->complaints->count() }}
        </p>

        <div class="horizontal bg-black my-1 px-8 py-2 flex flex-wrap justify-between space-y-6 ">
            <br>
            @foreach($status->complaints as $complaint)
                <a href="{{ route('maintenance.show', ['complaint' => $complaint->id]) }}"
                   class="horizontal block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-emerald-100 hover:border-emerald-400 border-transparent border-2 hover:p-6">
                   @if(!is_null($complaint->image))
                        <div class="relative  ">

                                <div class="flex content-center image-complaint ">
                                    <img src="/images/complaints/{{$complaint->image}}" class="mx-auto" alt="">
                                </div>
                        </div>
                    @endif

                    <div class="flex-content ">
                        <div class="vertical">
                            <div class="card activity-card back-white">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                    {{ $complaint->title }}
                                </h5>
                            </div>

                            <div class="card acivity-card back-white">
                                <h5 class="mb-2 text-xl tracking-tight text-gray-900 ">
                                    {{ $complaint->description }}
                                </h5>

                            </div>

                            <div class="card activity-card back-white">
                                <p class="bg-blue-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    <img src="/images/icons/like.png" width="25" height="25" alt="Logo fill-current text-gray-500"
                                    class="inline mr-1" viewBox="0 0 16 16"/>
                                    {{  $complaint->like_count }} likes
                                </p>

                                <p class="bg-green-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    <img src="/images/icons/organization.png" width="25" height="25" alt="Logo fill-current text-gray-500"
                                    class="inline mr-1" viewBox="0 0 16 16" />
                                    {{  $complaint->organization->name }}
                                </p>

                                <p class="bg-pink-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    <img src="/images/icons/megaphore.png" width="25" height="25" alt="Logo fill-current text-gray-500"
                                    class="inline mr-1" viewBox="0 0 16 16"/>
                                    {{  $complaint->tag->name }}
                                </p>
                                <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    <img src="/images/icons/status.jpg" width="25" height="25" alt="Logo fill-current text-gray-500"
                                         class="inline mr-1" viewBox="0 0 16 16"/>
                                    {{ $complaint->status->name }}
                                </p>
                            </div>


                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>



@endsection
