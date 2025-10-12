@extends('backend.master')

@section('content')

<!-- Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-primary font-weight-bold">Portfolio Dashboard</h1>
        <a href="#" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Top Summary Cards -->
    <div class="row">

        <!-- Projects -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Projects</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">24</div>
                    </div>
                    <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Services</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                    </div>
                    <i class="fas fa-cogs fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Blog Posts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Blog Posts</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                    </div>
                    <i class="fas fa-blog fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Messages</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <i class="fas fa-envelope fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <!-- Project Overview -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Project Overview</h6>
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="projectOverviewChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Stats -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-info text-white">
                    <h6 class="m-0 font-weight-bold">Category Stats</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="categoryPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2"><i class="fas fa-circle text-primary"></i> Web</span>
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> Design</span>
                        <span class="mr-2"><i class="fas fa-circle text-warning"></i> Branding</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="row">
        <!-- Recent Messages -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Recent Messages</h6>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">New message from client A</a>
                        <a href="#" class="list-group-item list-group-item-action">Feedback received from portfolio</a>
                        <a href="#" class="list-group-item list-group-item-action">Request for service quote</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-info text-white">
                    <h6 class="m-0 font-weight-bold">Quick Actions</h6>
                </div>
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary btn-sm m-2"><i class="fas fa-plus"></i> Add Project</a>
                    <a href="#" class="btn btn-success btn-sm m-2"><i class="fas fa-pencil-alt"></i> Edit About</a>
                    <a href="#" class="btn btn-warning btn-sm m-2"><i class="fas fa-cog"></i> Settings</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // ====== Project Overview Chart (Line Chart) ======
    const ctxOverview = document.getElementById('projectOverviewChart');
    new Chart(ctxOverview, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Completed Projects',
                data: [3, 5, 4, 7, 6, 9],
                borderColor: '#4e73df',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 3,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // ====== Category Stats Chart (Pie Chart) ======
    const ctxCategory = document.getElementById('categoryPieChart');
    new Chart(ctxCategory, {
        type: 'doughnut',
        data: {
            labels: ['Web', 'Design', 'Branding'],
            datasets: [{
                data: [55, 30, 15],
                backgroundColor: ['#4e73df', '#1cc88a', '#f6c23e'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#dda20a'],
                hoverBorderColor: 'rgba(234, 236, 244, 1)',
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endpush