@extends('layouts.main')

@section('content')
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
        <form action="{{ route('residents.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="-mx-3 flex flex-wrap">

                {{--                // -------------------------------}}
                <div class="w-full px-3 sm:w">
                    <div class="mb-5">
                        <label
                            for="dropdown"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Room number
                        </label>

                            <select name = "dropdown"
                                    id = "dropdown"
                                    onchange="gotoEdit()"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <option disabled selected style="display:none">Select Existed Room</option>
                                @foreach($residents as $resident)
                                    <option value="{{$resident->id}}" >{{ $resident->r_room_number }}</option>
                                @endforeach
                            </select>

                    </div>
                    {{ $resident->count() }}
                </div>
                {{--                                // -------------------------------}}

                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label
                            for="r_room_number"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Room number
                        </label>
                        <input
                            type="text"
                            maxlength="3"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                            name="r_room_number"
                            id="r_room_number"
                            placeholder="Room number"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label
                            for="r_name"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Name
                        </label>
                        <input
                            type="text"
                            name="r_name"
                            id="r_name"
                            placeholder="Name"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <label
                    for="r_tel"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Telephone number
                </label>
                <input
                    type="text"
                    name="r_tel"
                    id="r_tel"
                    placeholder="Telephone number"
                    min="0"
                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>

{{--            <div class="-mx-3 flex flex-wrap">--}}
{{--                <div class="w-full px-3 sm:w-1/2">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label--}}
{{--                            for="date"--}}
{{--                            class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            Date--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            type="date"--}}
{{--                            name="date"--}}
{{--                            id="date"--}}
{{--                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="w-full px-3 sm:w-1/2">--}}
{{--                    <div class="mb-5">--}}
{{--                        <label--}}
{{--                            for="time"--}}
{{--                            class="mb-3 block text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            Time--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            type="time"--}}
{{--                            name="time"--}}
{{--                            id="time"--}}
{{--                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"--}}
{{--                        />--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mb-5">--}}
{{--                <label class="mb-3 block text-base font-medium text-[#07074D]">--}}
{{--                    Are you coming to the event?--}}
{{--                </label>--}}
{{--                <div class="flex items-center space-x-6">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <input--}}
{{--                            type="radio"--}}
{{--                            name="radio1"--}}
{{--                            id="radioButton1"--}}
{{--                            class="h-5 w-5"--}}
{{--                        />--}}
{{--                        <label--}}
{{--                            for="radioButton1"--}}
{{--                            class="pl-3 text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            Yes--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="flex items-center">--}}
{{--                        <input--}}
{{--                            type="radio"--}}
{{--                            name="radio1"--}}
{{--                            id="radioButton2"--}}
{{--                            class="h-5 w-5"--}}
{{--                        />--}}
{{--                        <label--}}
{{--                            for="radioButton2"--}}
{{--                            class="pl-3 text-base font-medium text-[#07074D]"--}}
{{--                        >--}}
{{--                            No--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div>--}}
                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                    type="submit"
                >
                    Submit
                </button>
        </form>
    </div>
</div>
@endsection

<script>
    function gotoEdit() {
        console.log(document.getElementById('dropdown').value);
        window.location.href = '/residents/edit/'.concat(document.getElementById('dropdown').value);
        // let value = document.getElementById('dropdown').value;
        {{--window.location.href = '{{ route('residents.edit', ['resident' => document.getElementById('dropdown').value]) }}';--}}
    }

</script>
