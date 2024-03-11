@extends('layouts.admin')

@section('content')

@if(session('success'))
<div class="alert alert-success" id="alert">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" id="alert">
    {{ session('error') }}
</div>
@endif

<main style="margin-right: 30%;">
    <div class="container pt-2">
        <div class="welcome-page" style="margin-bottom: 10%; margin-left: 30%">
            <h2 class="welcome-message">Categories Page</h2>
        </div>
        <a type="button" class="btn btn-dark float-end" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
        <!-- Add -->
        <form method="POST" action="{{ route('addnewcategory')}}">
                            @csrf
                                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="form4Example1" class="form-label">Category Name</label>
                                                    <input type="text" id="form4Example1" name="categoryName" class="form-control"  />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button name="submit" type="submit" value="add" class="btn btn-dark float-end">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Categorie Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td> {{$category->name}}</td>
                        <td>
                            <a type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editModal{{$category->id}}">Edit</a>
                            <!-- Edit -->
                            <form method="POST" action="{{ route('updateCategory', $category->id)}}">
                            @csrf
                                <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <input type="hidden" name="id" value="{{$category->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="form4Example1" class="form-label">Category Name</label>
                                                    <input type="text" id="form4Example1" name="categoryName" class="form-control" value="{{$category->name}}" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button name="submit" type="submit" value="update" class="btn btn-dark float-end">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('deleteCategory', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark" onclick="return confirm('Are you sure you want to delete This Category?')">Delete</button>
                        </form>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>

        {{$categories->links()}}
</main>

@endsection