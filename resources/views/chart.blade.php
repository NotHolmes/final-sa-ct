<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

@extends('layouts.main')

@section('content')
    <div >
        <div class="flex justify-center">
            <button class="app-button" onclick="handlePrintBtn()">ดาวน์โหลด PDF</button>
        </div>

        <script>
            function handlePrintBtn() {
                print();
            }
        </script>
        <div class="">
            <div class="flex justify-center">
                <div class="rounded-lg overflow-hidden" style="width: 50%" style="height: 50%">
                    <div class="text-center p-2">กราฟแสดงจำนวนปัญหาโดยแยกตามประเภทของปัญหา</div>
                    <canvas class="" id="chartBar" style="width: 100%"></canvas>
                </div>

                <!-- Required chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Chart bar -->
                <script>
                    const labelsBarChart = @json($tag_names);
                    const dataBarChart = {
                        labels: labelsBarChart,
                        datasets: [
                            {
                                label: "จำนวนปัญหาของแต่ละประเภท",
                                backgroundColor: "hsl(151, 100%, 42%)",
                                borderColor: "hsl(252, 82.9%, 67.8%)",
                                data: @json($number_of_tags),
                            },
                        ],
                    };

                    const configBarChart = {
                        type: "bar",
                        data: dataBarChart,
                        options: {},
                    };

                    var chartBar = new Chart(
                        document.getElementById("chartBar"),
                        configBarChart
                    );
                </script>
            </div>





            <div class="w-full card flex justify-center">
                <div class="rounded-lg overflow-hidden">
                    <div class="text-center p-2">กราฟแสดงจำนวนปัญหาโดยแยกตามสถานะของปัญหา</div>
                    <canvas class="sm:max-w-xl sm:max-h-xl" id="chartDoughnut"></canvas>
                </div>

                <!-- Required chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Chart doughnut -->
                <script>
                    const dataDoughnut = {
                        labels: @json($status_names),
                        datasets: [
                            {
                                label: "จำนวนแสดงสถานะปัญหา",
                                data: @json($number_of_statuses),
                                backgroundColor: [
                                    "rgb(134 239 172)",
                                    "rgb(251 113 133)",
                                    "rgb(216 180 254)",
                                ],
                                hoverOffset: 4,
                            },
                        ],
                    };

                    const configDoughnut = {
                        type: "doughnut",
                        data: dataDoughnut,
                        options: {},
                    };

                    var chartBar = new Chart(
                        document.getElementById("chartDoughnut"),
                        configDoughnut
                    );
                </script>
            </div>

        </div>



@endsection
