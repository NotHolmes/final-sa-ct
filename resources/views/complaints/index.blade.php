{{-- resources/views/complaints/index.blade.php --}}
@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <form style="text-align:center" class="d-flex content-center" role="search" action="/search" method="GET" name="search">
            <input class="form-control me-2 w-full" style="width:70%" type="text" placeholder="ค้นหา" aria-label="Search" name="search">
            <button class="example_a btn-outline-success"  type="submit">ค้นหา</button>
        </form>

        <h1 class="text-3xl mx-4 mt-6">
            เรื่องร้องเรียน
        </h1>
        <br>

        <div class="horizontal bg-black my-1 px-8 py-2 flex flex-wrap justify-between space-y-6 ">
            <br>
            @foreach($complaints as $complaint)

                <a href="{{ route('complaints.show', ['complaint' => $complaint->id]) }}"
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
