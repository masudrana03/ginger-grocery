@extends('backend.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <!-- page title  -->
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_25 f_w_700 dark_text">Dashboard</h3>
                            <ol class="breadcrumb page_bradcam mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Analytic</li>
                            </ol>
                        </div>
                        {{-- <div class="page_title_right">
                            <div class="page_date_button">
                                August 1, 2020 - August 31, 2020
                            </div>
                            <div class="dropdown common_bootstrap_button ">
                                <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-expanded="false">
                                    action
                                </span>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item f_s_16 f_w_600" href="#"> Download</a>
                                    <a class="dropdown-item f_s_16 f_w_600" href="#"> Print</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row ">
                @if (isAdmin())
                    <div class="col-xl-6">
                        <div class="white_card card_height_100 mb_30 social_media_card">
                            <div class="media_card_body">
                                <div class="media_card_list">
                                    <div class="single_media_card">
                                        <h4>Total Sale</h4>
                                        <h3>{{ settings('currency') }}{{ $sales }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Order</h4>
                                        <h3>{{ $orders }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Vendor</h4>
                                        <h3>{{ $vendors }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Customer</h4>
                                        <h3>{{ $customers }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 ">
                        <div class="white_card card_height_100 mb_30 social_media_card">
                            <div class="media_card_body">
                                <div class="media_card_list">
                                    <div class="single_media_card">
                                        <h4>Total Zone</h4>
                                        <h3>{{ $dashboardZones }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Product</h4>
                                        <h3>{{ $dashboardProducts }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Category</h4>
                                        <h3>{{ $dashboardCategories }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Delivery Boy</h4>
                                        <h3>{{ $deliveryMans }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xl-6">
                        <div class="white_card card_height_100 mb_30 social_media_card">
                            <div class="media_card_body">
                                <div class="media_card_list">
                                    <div class="single_media_card">
                                        <h4>Total Sale</h4>
                                        <h3>{{ settings('currency') }}{{ $sales }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Orders</h4>
                                        <h3>{{ $orders }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Pending Orders</h4>
                                        <h3>{{ $pendingOrders }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Processing Orders</h4>
                                        <h3>{{ $processingOrders }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 ">
                        <div class="white_card card_height_100 mb_30 social_media_card">
                            <div class="media_card_body">
                                <div class="media_card_list">
                                    <div class="single_media_card">
                                        <h4>Canceled Orders</h4>
                                        <h3>{{ $canceledOrders }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Customers</h4>
                                        <h3>{{ $customers }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Products</h4>
                                        <h3>{{ $dashboardProducts }}</h3>
                                    </div>
                                    <div class="single_media_card">
                                        <h4>Total Reviews</h4>
                                        <h3>{{ $reviews }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="white_card mb_30 card_height_100">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <h3>Sales per month in {{ now()->format('Y') }}</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="white_card mb_30 card_height_100">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <h3>Sales per day in {{ now()->format('F') }}</h3>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <canvas id="myChart2" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
        integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        // Monthly chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($totalMonths),
                datasets: [{
                    label: 'Total Sales Per Month',
                    data: @json($totalMonthlySales),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Daily chart
        const ctx2 = document.getElementById('myChart2').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($totalDays),
                datasets: [{
                        label: 'Total Orders Per Day',
                        data: @json($totalDailyOrders),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Total Sales Per Day',
                        data: @json($totalDailySales),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
