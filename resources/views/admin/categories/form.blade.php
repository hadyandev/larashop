@extends('admin.layout')

@section('content')

@php
    $formTitle = !empty($category) ? 'Update' : 'New'
@endphp

    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-bottom">
                        <h2>{{ $formTitle }} Category</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash', ['errors' => $errors])
                        @if (!empty($category))
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @method('PATCH')
                        @else
                        <form action="{{ route('categories.store') }}" method="POST">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" @if (!empty($category)) value="{{ $category->name }}" @endif>
                            </div>
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-default">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection