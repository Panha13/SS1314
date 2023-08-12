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
                <tbody>
                {{-- @foreach ($slideshows as $index => $slideshow)
                    <tr>
                        <td>{{ ($slideshows->currentPage() - 1) * $slideshows->perPage() + $loop->iteration }}</td>
                        <td><img src={{ URL::asset('images/slideshows/thumbnail/' . $slideshow->img) }}></td>
                        <td>{{ $slideshow->title }}</td>
                        <td>{{ $slideshow['subtitle'] }}</td>
                        <td>{{ $slideshow->text }}</td>
                        <td>{{ $slideshow->link }}</td>
                        <td>
                            <a class="text-decoration-none" href="javascript:void(0)" data-id="{{ $slideshow['ssid'] }}"
                                data-action="{{ $slideshow['enable'] }}" data-page="{{ $slideshows->currentPage() }}"
                                onclick="toggleSlideshow(this)">
                                <i class="align-middle"
                                    data-feather="{{ $slideshow['enable'] == 1 ? 'eye' : 'eye-off' }}"></i>
                            </a>

                            <a class="text-decoration-none" href="{{ route('admin.slideshow.moveupdown', ['id' => $slideshow['ssid'], 'action' => '1', 'page' => $slideshows->currentPage()]) }}" onclick="moveUpDown(event, this)">
                                <i class="align-middle" data-feather="arrow-up"></i>
                            </a>
                            <a class="text-decoration-none" href="{{ route('admin.slideshow.moveupdown', ['id' => $slideshow['ssid'], 'action' => '0', 'page' => $slideshows->currentPage()]) }}" onclick="moveUpDown(event, this)">
                                <i class="align-middle" data-feather="arrow-down"></i>
                            </a>

                            <a class="text-decoration-none" href="#" data-id="{{ $slideshow['ssid'] }}" data-page="{{ $slideshows->currentPage() }}" 
                                onclick="deleteSlideshow(event, this)">
                                <i class="align-middle" data-feather="trash"></i>
                            </a>
                            <a class="text-decoration-none"
                                href="{{ route('admin.slideshow.edit', ['id' => $slideshow['ssid']]) }}">
                                <i class="align-middle" data-feather="edit"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $slideshow['ssid'] }}" tabindex="-1" role="dialog"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this slideshow?
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('admin.slideshow.delete', ['id' => $slideshow['ssid'], 'page' => $slideshows->currentPage()]) }}"
                                        class="btn btn-primary">Yes</a>
                                    <a class="btn btn-secondary" data-dismiss="modal">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal -->
                @endforeach --}}
                </tbody>
            </table>

            {{-- <div class="d-flex justify-content-center">
                {{ $slideshows->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </main>
@endsection
