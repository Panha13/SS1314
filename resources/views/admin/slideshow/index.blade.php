@extends('admin.layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3 float-start">Slideshow</h1>
            <a href="{{ route('admin.slideshow.form') }}" class="btn btn-primary float-end">Add Slideshow</a>
            <div style="clear:both"></div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Text</th>
                    <th>Link</th>
                    <th>Action</th>
                </thead>
                <tbody id="slideshowBody">
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $slideshows->links() }}
            </div>
        </div>
    </main>
@endsection
