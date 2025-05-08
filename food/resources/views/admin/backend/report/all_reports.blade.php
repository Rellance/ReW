@extends('admin.dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Admin All Reports</h4>
                        <div class="page-title-right">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <div class="row align-items-start">

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <form id="myForm" action="{{ route('category.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <h4>Search by Date</h4>
                                                            <div class="form-group mb-3">
                                                                <label for="example-text-input"
                                                                    class="form-label">Select Date:</label>
                                                                <input class="form-control" type="date" name="date"
                                                                    id="example-text-input">
                                                            </div>

                                                            <div class="mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card">
                                            <form id="myForm" action="{{ route('category.store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <h4>Search by Month</h4>
                                                            <div class="form-group mb-3">
                                                                <label for="example-text-input"
                                                                    class="form-label">Select Month:</label>
                                                            </div>

                                                            <input class="form-control" name="month" type="month" id="example-month-input">

                                                            <div class="mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">Search
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="grid-example mt-2 mt-sm-0">
                                            <code>col-sm-4</code>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
