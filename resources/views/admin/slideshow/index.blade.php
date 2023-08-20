@extends('admin.layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <main class="content">
        
    </main>
    <script>
        const hidemodal = ()=>{
            $('#deleteModal').modal('hide');
        }
        $(document).ready(function() {
            loadSlideshowPage(); 
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
