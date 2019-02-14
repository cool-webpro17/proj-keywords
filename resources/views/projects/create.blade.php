@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="create-form" action="{{route('projects.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">Create Project</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="projectNameInput">Name</label>
                            <input type="text" name="name" class="form-control" id="projectNameInput" aria-describedby="nameHelp" placeholder="Enter Name">
                            <small id="nameHelp" class="form-text text-muted">Put the name of Project</small>
                        </div>
                        <div class="form-group">
                            <label for="projectDescriptionText">Description</label>
                            <textarea type="text" name="description" class="form-control" id="projectDescriptionText" aria-describedby="descriptionHelp" placeholder="Enter Description"></textarea>
                            <small id="descriptionHelp" class="form-text text-muted">Put the description of Project</small>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button type="submit" class="btn btn-primary">Store</button>
                        <a class="btn btn-secondary" href="{{route('projects.index')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
