@extends('admin.dashboard')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">All Role in Permission</h4>
                    <div class="page-title-right">
                        <a href="{{ route('add.roles.permission') }}" class="btn btn-primary">Add Role Permission</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th width="20%">Role Name</th>
                                        <th width="55%">Permission Name</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $key=> $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($item->permissions as $prem)
                                                <span class="badge bg-danger">{{ $prem->name }}</span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.edit.roles',$item->id) }}" 
                                                   class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="{{ route('admin.delete.permissions',$item->id) }}" 
                                                   class="btn btn-danger btn-sm" 
                                                   id="delete">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            responsive: true,
            scrollX: true,
            autoWidth: false
        });
    });
</script>
@endpush

@endsection