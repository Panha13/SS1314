@extends('admin.layouts.admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <main class="content">
        
    </main>
    <script>
        const hidemodal = ()=>{
            $('#deleteModal').modal('hide');
        }
    </script>
@endsection
