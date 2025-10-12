@extends('backend.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Update About Section</h4>
        </div>
        <div class="card-body">

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">About Title</label>
                    <input type="text" name="title" value="" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">About Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="Name" value="" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                        <img src="#" alt="About Image" width="120" class="rounded mb-2">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload CV</label><br>
                    <input type="file" name="CV" class="form-control">
                </div>

                <button type="submit" class="btn btn-success px-4">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
