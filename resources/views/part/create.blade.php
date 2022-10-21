@extends('layouts.main')

@section('content')
    <div class="flex items-center justify-center p-12">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="mx-auto w-full max-w-[550px]">
            <form action="{{ route('parts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="-mx-3 flex flex-wrap">


                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label
                                for="p_name"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Name
                            </label>
                            <input
                                required
                                type="text"
                                name="p_name"
                                id="p_name"
                                placeholder="Name"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            />
                        </div>
                    </div>

                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label
                                for="p_quantity"
                                class="mb-3 block text-base font-medium text-[#07074D]"
                            >
                                Quantity
                            </label>
                            <input
                                required
                                type="number"
                                min="1"
                                max="999"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                name="p_quantity"
                                id="p_quantity"
                                placeholder="Quantity"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            />
                        </div>
                    </div>

                </div>

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
