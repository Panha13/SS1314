@extends('admin.layouts.admin')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3 float-start">categorys</h1>
            <button class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#categoryForm">Add new
                category</button>
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
            @if ($categorys->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-fixed">
                    <thead class="thead-light">
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Action</th>
                    </thead class="thead-light">

                    @foreach ($categorys as $category)
                        <tbody>
                            <td >{{ ($categorys->currentPage() - 1) * $categorys->perPage() + $loop->iteration }}</td>
                            <td>{{ $category->cname }}</td>
                            <td class="text-short">{{ $category->cdesc }}</td>
                            <td >
                                <a class="text-decoration-none" href="#" data-bs-toggle="modal"
                                    data-bs-target="#editcategoryForm{{ $category['cid'] }}">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>
                                <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#deleteModal{{ $category['cid'] }}">
                                    <i class="align-middle" data-feather="trash"></i>
                                </a>

                            </td>
                        </tbody>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $category['cid'] }}" tabindex="-1" role="dialog"
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
                                        Are you sure you want to delete this product?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('admin.category.delete', ['id' => $category['cid'], 'page' => $categorys->currentPage()]) }}"
                                            class="btn btn-primary">Yes</a>
                                        <a class="btn btn-secondary" data-dismiss="modal">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add New category Modal-->
                        <form action="{{ route('admin.category.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal fade" id="categoryForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-name" id="Label">category Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="txtcname" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="txtcname" name="txtcname"
                                                    placeholder="name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtcdesc" class="form-label">descript</label>
                                                {{-- <input type="text" class="form-control" id="txtcdesc" name="txtcdesc"
                                                    placeholder="description"> --}}
                                                <textarea class="form-control" id="txtcdesc" name="txtcdesc" placeholder="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Submit" />
                                            <input type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                value="Close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End ADD New category Modal-->

                        <!-- START Edit category Modal -->
                        <form action="{{ route('admin.category.update') }}" method="post" enctype="multipart/form-data">

                            @csrf <!-- Add the CSRF token here -->
                            <input type="hidden" name="txtcid" value="{{ $category->cid }}" />
                            <div class="modal fade" id="editcategoryForm{{ $category['cid'] }}" tabindex="-1"
                                aria-labelledby="editcategoryFormModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-name" id="exampleModalLabel">Edit category Form</h5>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="txteditcname" class="form-label">name</label>
                                                <input type="text" class="form-control" id="txteditcname"
                                                    name="txteditcname" value="{{ $category->cname }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txteditcdesc" class="form-label">description</label>
                                                {{-- <input type="text" class="form-control" id="txteditcdesc"
                                                    name="txteditcdesc"
                                                    value={{ isset($category) ? $category['cdesc'] : '' }}> --}}
                                                <textarea class="form-control" id="txteditcdesc" 
                                                name="txteditcdesc" required>{{ isset($category) ? $category['cdesc'] : '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" value="Submit" />
                                            <input type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                value="Close" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- END Edit category Modal -->
                    @endforeach
                </table>
            </div>
                <div class="d-flex justify-content-center">
                    {{ $categorys->links('pagination::bootstrap-4') }}
                </div>
            @else
                <div class="d-flex justify-content-center">NO categoryS</div>
            @endif
        </div>
    </main>
@endsection
</main>
