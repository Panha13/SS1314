@extends('admin.layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3 float-start">Product</h1>
            <a href="{{route('admin.slideshow.form')}}" class="btn btn-primary float-end">Add product</a>
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
                    <th>Product name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>catagory</th>
                    <th>Quanity</th>
                    <th>Action</th>
                </thead>
                <tbody id="productBody">
                </tbody>
        
            </table>
            <div class="d-flex justify-content-center" id="pagenation">
                {{-- pagenation --}}
            </div>
            {{-- modal delete--}}
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" onclick="hidemodal()" aria-label="Close">
                        <span class="close" data-dismiss="modal">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Are sure want to delete this slideshow? 
                    </div>
                    <div class="modal-footer">                    
                      <button type="button" class="btn btn-primary" id="deleteSlideshow">Yes</button>
                      <button type="button" class="btn btn-secondary" onclick="hidemodal()" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const hidemodal = ()=>{
            $('#deleteModal').modal('hide');
        }
        $(document).ready(function() {
            showSlideshow();
            // Add event listener for click event on pagination links
            pagination();
            handlePopstate();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
        });
    </script>
    
@endsection
