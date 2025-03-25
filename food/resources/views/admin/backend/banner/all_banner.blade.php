@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- Start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Banner</h4>
                    <div class="page-title-right">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#myModal">Add Banner</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Banner Image</th>
                                    <th>Banner URL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="" style="width: 70px; height:40px;"></td>
                                        <td>{{ $item->url }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#myEdit" id="{{ $item->id }}"
                                                onclick="bannerEdit(this.id)">Edit</button>
                                            <a href="{{ route('delete.banner', $item->id) }}"
                                                class="btn btn-danger waves-effect waves-light" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- End col -->
        </div> <!-- End row -->

    </div> <!-- Container-fluid -->
</div>

<!-- Add Banner Modal -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="banner_url" class="form-label">Banner URL</label>
                        <input class="form-control" type="text" name="url" id="banner_url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Banner Image</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <div class="form-group mb-3">
                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt=""
                            class="rounded-circle p-1 bg-primary" width="110">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Banner Modal -->
<div id="myEdit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    data-bs-scroll="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('banner.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="banner_id" id="banner_id">
                    <div class="form-group mb-3">
                        <label for="banner_url" class="form-label">Banner URL</label>
                        <input class="form-control" type="text" name="url" id="banner_url">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Banner Image</label>
                        <input class="form-control" type="file" name="image" id="image_edit">
                    </div>
                    <div class="form-group mb-3">
                        <img id="bannerImage" src="{{ url('upload/no_image.jpg') }}" alt=""
                            class="rounded-circle p-1 bg-primary" width="110">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function bannerEdit(id) {
        $.ajax({
            type: 'GET',
            url: '/banner/edit/' + id,
            dataType: 'json',
            success: function(data) {
                $('#banner_url').val(data.url);
                $('#bannerImage').attr('src', data.image);
                $('#banner_id').val(data.id);
            },
            error: function(xhr) {
                console.error('Error fetching banner data:', xhr.responseText);
            }
        });
    }

    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        $('#image_edit').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection