@extends('layouts.main')

@section('content')
<div class="flex items-center justify-center p-12">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->

    <div class="mx-auto w-full max-w-[550px]">
        <form action="{{ route('maintenances.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label
                    for="m_detail"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Details
                </label>
                <textarea
                    required
                    name="m_detail"
                    id="m_detail"
                    placeholder="Details..."
                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                ></textarea>
            </div>

            <div>
                <label
                    for="m_image"
                    class="mb-3 block text-base font-medium text-[#07074D]"
                >
                    Image
                </label>
                <input type="file" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                       required
                       name="m_image"
                       id="m_image"
                       accept=".jpg,.jpeg,.png">
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
