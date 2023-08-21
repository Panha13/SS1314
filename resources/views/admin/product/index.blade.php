@extends('admin.layouts.admin')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3 float-start">Products</h1>
            <button class="btn btn-primary float-end mb-3" data-bs-toggle="modal" data-bs-target="#productForm">Add new
                Product</button>
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
            @if ($products->count() > 0)
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price</th>
                        <th>Featured</th>
                        <th>Category ID</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                            <td><img src="{{ URL::asset('images/products/thumbnail/' . $product->pimg) }}"></td>
                            <td class="text-sm-short">{{ $product->pname }}</td>
                            <td class="text-sm-short">{{ $product->pdesc }}</td>
                            <td>{{ $product->pprice }}</td>
                            <td>{{ $product->featured ? '1' : '0' }}</td>
                            <td>{{ $product->cid }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>
                                <a class="text-decoration-none" href="#" data-bs-toggle="modal"
                                    data-bs-target="#editproductForm{{ $product['pid'] }}">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>
                                <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#deleteModal{{ $product['pid'] }}">
                                    <i class="align-middle" data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $product['pid'] }}" tabindex="-1" role="dialog"
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
                                        <a href="{{ route('admin.product.delete', ['id' => $product['pid'], 'page' => $products->currentPage()]) }}"
                                            class="btn btn-primary">Yes</a>
                                        <a class="btn btn-secondary" data-dismiss="modal">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Add New product Modal-->
                        <form action="{{ route('admin.product.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal fade" id="productForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-name" id="Label">Product Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="txtpname" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="txtpname" name="txtpname"
                                                    placeholder="name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtpdesc" class="form-label">descript</label>
                                                {{-- <input type="text" class="form-control" id="txtpdesc" name="txtpdesc"
                                                    placeholder="description"> --}}
                                                <textarea class="form-control" id="txtpdesc" name="txtpdesc"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtpprice" class="form-label">Product Price</label>
                                                <input type="text" class="form-control" id="txtpprice" name="txtpprice"
                                                    placeholder="Price">
                                            </div>

                                            <div class="mb-3">
                                                <label for="txtfeatured" class="form-label">Featured</label>
                                                <input type="text" class="form-control" id="txtfeatured"
                                                    name="txtfeatured" placeholder="featured">
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtquantity" class="form-label">Quantity</label>
                                                <input type="text" class="form-control" id="txtquantity"
                                                    name="txtquantity" placeholder="quantity product">
                                            </div>
                                            <div class="mb-3">
                                                <label for="txtcid" class="form-label">Cid</label>
                                                <input type="text" class="form-control" id="txtcid" name="txtcid"
                                                    placeholder="Category_id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pimg" class="form-label">Default file input
                                                    example</label>
                                                <input class="form-control" type="file" id="pimg"
                                                    name="pimg">
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
                        <!-- End ADD New product Modal-->

                        <!-- START Edit product Modal -->
                        <form action="{{ route('admin.product.update') }}" method="post" enctype="multipart/form-data">

                            @csrf <!-- Add the CSRF token here -->
                            <input type="hidden" name="txtpid" value="{{ $product->pid }}" />
                            <div class="modal fade" id="editproductForm{{ $product['pid'] }}" tabindex="-1"
                                aria-labelledby="editproductFormModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-name" id="Label">Edit product Form</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="txteditpname" class="form-label">name</label>
                                                <input type="text" class="form-control" id="txteditpname"
                                                    name="txteditpname" value="{{ $product->pname }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="txteditpdesc" class="form-label">description</label>
                                                {{-- <input type="text" class="form-control" id="txteditpdesc"
                                                    name="txteditpdesc"
                                                    value={{ isset($product) ? $product['pdesc'] : '' }}> --}}
                                                <textarea class="form-control" id="txteditpdesc" name="txteditpdesc">{{ isset($product) ? $product['pdesc'] : '' }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txteditpprice" class="form-label">Product Price</label>
                                                <input type="text" class="form-control" id="txteditpprice"
                                                    name="txteditpprice"
                                                    value={{ isset($product) ? $product['pprice'] : '' }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txteditfeatured" class="form-label">Featured</label>
                                                <input type="text" class="form-control" id="txteditfeatured"
                                                    name="txteditfeatured"
                                                    value={{ isset($product) ? $product['featured'] : '' }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txteditquantity" class="form-label">Quantity</label>
                                                <input type="text" class="form-control" id="txteditquantity"
                                                    name="txteditquantity"
                                                    value={{ isset($product) ? $product['quantity'] : '' }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="txteditcid" class="form-label">Cat_id</label>
                                                <input type="text" class="form-control" id="txteditcid"
                                                    name="txteditcid" value={{ isset($product) ? $product['cid'] : '' }}>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editpimg" class="form-label">Default file input
                                                    example</label>
                                                <input class="form-control" type="file" id="editpimg"
                                                    name="editpimg">
                                            </div>
                                            @if (isset($product))
                                                <div class="mb-3">
                                                    <img src="{{ URL::asset('images/products/thumbnail/' . $product->pimg) }}"
                                                        class="img-thumbnail" />
                                                    <p>{{ $product->pimg }}</p>
                                                </div>
                                            @endif
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
                        <!-- END Edit product Modal -->
                    @endforeach
                </table>
                <div class="d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            @else
                <div class="d-flex justify-content-center">NO PRODUCTS</div>
            @endif
        </div>
    </main>
@endsection
