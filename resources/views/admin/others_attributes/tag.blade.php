@extends('layouts.app')

@section('page_title') Tag @endsection

@section('main_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">All Tag List</h3>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Tag Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $single_item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $single_item->title }}</td>
                                    <td style="padding: 0; vertical-align: middle">
                                        <a href="#custom-modal-{{ $single_item->id }}" class="btn btn-primary waves-effect waves-light m-r-5" data-animation="push" data-plugin="custommodal"
                                           data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-edit"></i></a>
                                        @if($single_item->id != 1)
                                        <a href="#delete-modal-{{ $single_item->id }}" class="btn btn-danger waves-effect waves-light" data-animation="sign" data-plugin="custommodal"
                                           data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>

                                <!-- Update Modal -->
                                <div id="custom-modal-{{ $single_item->id }}" class="modal-demo text-left">
                                    <button type="button" class="close" onclick="Custombox.close();">
                                        <span>&times;</span><span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="custom-modal-title">Update Tag</h4>
                                    <div class="custom-modal-text">
                                        <form action="{{ route('manage_tags.update', $single_item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" value="{{ $single_item->title }}" class="form-control" name="title">
                                            </div>
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-success" value="Update Tag">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Delete Modal -->
                                <div id="delete-modal-{{ $single_item->id }}" class="modal-demo text-left">
                                    <button type="button" class="close" onclick="Custombox.close();">
                                        <span>&times;</span><span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="custom-modal-title">Delete Tag</h4>
                                    <div class="custom-modal-text text-center">
                                        <h4 style="font-size: 24px">Are you sure to delete?</h4>
                                        <p>NB: All of child of this will be transfer to general tag.</p>
                                        <form action="{{ route('manage_tags.destroy', $single_item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="text-center">
                                                <input type="submit" class="btn btn-danger m-r-5" value="DELETE TAG">
                                                <button onclick="Custombox.close();" type="button" class="btn btn-success">NOT NOW</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                        {{ $tags->links() }}
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add New</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_tags.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{ old('title') }}" name="title">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Add Tag">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin_css')
    <!-- DataTables -->
    <link href="{{ asset('admin/plugins') }}/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/plugins') }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
@endsection


@section('javascript')
    <script src="{{ asset('admin/plugins') }}/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin/plugins') }}/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').dataTable({
                ordering: false
            });
        });
    </script>
@endsection
