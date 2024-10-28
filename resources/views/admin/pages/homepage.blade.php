@extends('layouts.app')

@section('page_title') Home Page Management @endsection

@section('main_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Home Page Management</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <th>Section Title</th>
                            <th>Section Type</th>
                            <th>Category/Sub Category/Subject</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                        @forelse($sections as $section)
                            <form action="{{ route('manage_home_page.update', $section->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <tr>
                                    <td><input type="text" class="form-control" name="section_title" value="{{ $section->section_title }}"></td>
                                    <td>
                                        <select name="type" class="form-control" onchange="changeTypeUpdate_{{ $section->id }}()" id="type{{ $section->id }}">
                                            <option disabled selected>Select a section type</option>
                                            <option value="1" {{ $section->type == 1 ? 'selected' : '' }}>Category</option>
                                            <option value="2" {{ $section->type == 2 ? 'selected' : '' }}>Sub Category/Subject</option>
                                            <option value="3" {{ $section->type == 3 ? 'selected' : '' }}>Writer Section</option>
                                            <option value="4" {{ $section->type == 4 ? 'selected' : '' }}>Weekly Offer</option>
                                            <option value="4" {{ $section->type == 5 ? 'selected' : '' }}>New Books</option>
                                            <option value="4" {{ $section->type == 6 ? 'selected' : '' }}>At a Glance</option>
                                        </select>
                                    <td>

                                        <div class="{{ $section->type == 1 ? '' : 'd-none' }}" id="category{{ $section->id }}">
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option {{ $category->id == $section->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }} ({{ count($category->products) }})</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="{{ $section->type == 2 ? '' : 'd-none' }}" id="sub_category{{ $section->id }}">
                                            <select name="sub_category_id" class="form-control">
                                                @foreach($sub_categories as $sub_category)
                                                    <option {{ $sub_category->id == $section->category_id ? 'selected' : '' }} value="{{ $sub_category->id }}">{{ $sub_category->title }} ({{ count($sub_category->products) }})</option>
                                                @endforeach
                                            </select>
                                        </div>


                                    </td>
                                    <td class="text-center" style="width: 100px">
                                        <input type="number" value="{{ $section->order }}" name="order" class="form-control text-center">
                                    </td>
                                    <td style="white-space: nowrap">
                                        <button type="submit" class="btn btn-success">U</button>
                                        <a onclick="return confirm('Are sure to delete this sectioin?')" href="{{ route('manage_home_page.show', $section->id) }}" class="btn btn-danger">D</a>
                                    </td>
                                </tr>
                            </form>

                            <script>
                                function changeTypeUpdate_{{ $section->id }}(){
                                    var selected_id = document.getElementById("type{{ $section->id }}").value
                                    if (selected_id == 1){
                                        document.getElementById('category{{ $section->id }}').classList.remove('d-none')
                                        document.getElementById('sub_category{{ $section->id }}').classList.add('d-none')
                                    }else if (selected_id == 2){
                                        document.getElementById('category{{ $section->id }}').classList.add('d-none')
                                        document.getElementById('sub_category{{ $section->id }}').classList.remove('d-none')
                                    }else{
                                        document.getElementById('category{{ $section->id }}').classList.add('d-none')
                                        document.getElementById('sub_category{{ $section->id }}').classList.add('d-none')
                                    }
                                }
                            </script>
                        @empty
                            <tr>
                                <td colspan="5">No Section Found in Home Page</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add a New Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_home_page.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="order" value="{{ $last_order }}">
                        <div class="form-group">
                            <label for="">Section Type</label>
                            <select name="type" class="form-control" onchange="changeType()" id="type">
                                <option disabled selected>Select a section type</option>
                                <option value="1">Category</option>
                                <option value="2">Sub Category/Subject</option>
                                <option value="3">Writer Section</option>
                                <option value="4">Weekly Offer</option>
                                <option value="5">New Books</option>
                                <option value="6">At a Glance</option>
                            </select>
                        </div>
                        <div class="form-group d-none" id="category">
                            <label for="">Select a Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }} ({{ count($category->products) }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-none" id="sub_category">
                            <label for="">Select a Sub Category/Subject</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}">{{ $sub_category->title }} ({{ count($sub_category->products) }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Section Title (Optional)</label>
                            <input type="text" name="section_title" class="form-control">
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Add Section">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeType(){
            var selected_id = document.getElementById('type').value
            if (selected_id == 1){
                document.getElementById('category').classList.remove('d-none')
                document.getElementById('sub_category').classList.add('d-none')
            }else if (selected_id == 2){
                document.getElementById('category').classList.add('d-none')
                document.getElementById('sub_category').classList.remove('d-none')
            }else{
                document.getElementById('category').classList.add('d-none')
                document.getElementById('sub_category').classList.add('d-none')
            }
        }
    </script>
@endsection
