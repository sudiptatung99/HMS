@section('title') {{ 'Operation Category' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Category</h3>
                <div class="nk-block-des text-soft">
                    <p>Category List</p>
                </div>
            </div>
            <a href="#" data-bs-toggle="modal" data-bs-target="#addCategory" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-plus-circle-fill"></em><span>New</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable-init-export nowrap table">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Name</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($operation_category as $key => $operation_category)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $operation_category->name }}</td>
                                    <td>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">
                                                <ul class="link-list-opt no-bdr">
                                                {{-- @can('update-pathology-category') --}}
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#updateCategory{{ $operation_category->id }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span>
                                                        </a>
                                                    </li>
                                                {{-- @endcan --}}
                                                {{-- @can('delete-pathology-category') --}}
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $operation_category->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>
                                                        </a>
                                                    </li>
                                                {{-- @endcan --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="updateCategory{{ $operation_category->id }}" tabindex="-1" aria-labelledby="updateCategoryLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateCategoryLabel">Update Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('operation.category.update.store', encrypt($operation_category->id)) }}" method="POST">
                                            @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Category Name <i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" name="name" value="{{ $operation_category->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteWarning{{ $operation_category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <div class="h1 mx-auto text-warning mb-3">
                                                        <em class="icon bi bi-exclamation-triangle"></em>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-10">
                                                            <h4 class="title nk-block-title mb-3">Warning !</h4>
                                                            <p class="text-muted font-size-14">Are you sure you want to delete?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="{{ route('operation.category.delete', encrypt($operation_category->id)) }}">Yes</a>
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('operation.category.store') }}" method="POST">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name <i class="text-danger">*</i></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
