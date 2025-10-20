@extends('backend.master')

@section('content')
<style>
    body {
        background-color: #f8fafc;
    }

    .card-custom {
        background: #ffffff;
        border: 1px solid #dbe7f4;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        padding: 25px;
        margin-bottom: 30px;
    }

    .card-header-custom {
        background: linear-gradient(90deg, #0b3c6a, #28b5f6);
        color: #fff;
        font-weight: 600;
        border-radius: 8px 8px 0 0;
        padding: 12px 20px;
    }

    .btn-sky {
        background-color: #28b5f6;
        color: #fff;
        border: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-sky:hover {
        background-color: #0b3c6a;
        color: #fff;
    }

    .add-btn {
        background-color: #0b3c6a;
        color: #fff;
        border: none;
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 14px;
    }

    .add-btn:hover {
        background-color: #28b5f6;
    }

    .form-label {
        font-weight: 500;
        color: #0b3c6a;
    }
</style>

<div class="container-fluid">
    <!-- ==================== PORTFOLIO INFO ==================== -->
    <div class="card-custom">
        <div class="card-header-custom">Portfolio Information</div>
        <div class="card-body">
            <form action="{{url('/portfolio/store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter project title">
                </div>

                <div class="mb-3">
                    <label class="form-label">Main Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gallery Images</label>
                    <input type="file" name="gallery_images[]" class="form-control" multiple>
                </div>

                <div class="mb-3">
                    <label class="form-label">Portfolio Name</label>
                    <input type="text" name="portfolio_name" class="form-control" placeholder="Enter portfolio name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Live Link</label>
                    <input type="url" name="live_link" class="form-control" placeholder="https://example.com">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Write a short description..."></textarea>
                </div>

                <button type="submit" class="btn btn-sky">Save Portfolio</button>
            </form>
        </div>
    </div>

    <!-- ==================== PROJECT OVERVIEW ==================== -->
    <div class="card-custom">
        <div class="card-header-custom">Project Overview</div>
        <div class="card-body">
            <form action="{{url('/portfolio/overview')}}" method="POST">
                @csrf
                 <input type="hidden" name="portfolio_id" value="{{ $portfolios->id }}">
                <div id="overview-container">
                    <div class="overview-group mb-3 border p-3 rounded">
                        <div class="mb-2">
                            <label class="form-label">Icon</label>
                            <input type="text" name="overview_icon[]" class="form-control" placeholder="e.g. fa-solid fa-code">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Title</label>
                            <input type="text" name="overview_title[]" class="form-control" placeholder="Enter overview title">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Description</label>
                            <textarea name="overview_description[]" class="form-control" rows="2" placeholder="Short overview description..."></textarea>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm remove-overview">Remove</button>
                    </div>
                </div>

                <button type="button" id="addOverview" class="add-btn mb-3">
                    + Add Overview
                   

                </button>
                <br>
                <button type="submit" class="btn btn-sky">Save Overview</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('addOverview').addEventListener('click', function () {
        const container = document.getElementById('overview-container');
        const newField = document.createElement('div');
        newField.classList.add('overview-group', 'mb-3', 'border', 'p-3', 'rounded');
        newField.innerHTML = `
            <div class="mb-2">
                <label class="form-label">Icon</label>
                <input type="text" name="overview_icon[]" class="form-control" placeholder="e.g. fa-solid fa-code">
            </div>
            <div class="mb-2">
                <label class="form-label">Title</label>
                <input type="text" name="overview_title[]" class="form-control" placeholder="Enter overview title">
            </div>
            <div class="mb-2">
                <label class="form-label">Description</label>
                <textarea name="overview_description[]" class="form-control" rows="2" placeholder="Short overview description..."></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-overview">Remove</button>
        `;
        container.appendChild(newField);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-overview')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection
