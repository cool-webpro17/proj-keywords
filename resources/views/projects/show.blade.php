@extends('layouts.app')

@section('modals')
    <div class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="addKeywordsModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="create-form" action="{{route('keywords.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Keywords</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="keywordsName">Name</label>
                            <input type="text" name="keywords_name" class="form-control" id="keywordsName" aria-describedby="nameHelp" placeholder="Enter Keywords">
                            <small id="nameHelp" class="form-text text-muted">Separate the name by comma(ex; keyword 1, keyword 2)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-{{session('message.status')}}" role="alert">
                    {{session('message.content')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Show Project</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="projectNameInput">Name</label>
                        <input type="text" name="name" class="form-control" id="projectNameInput" value="{{$project->name}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="projectDescText">Description</label>
                        <textarea type="text" name="name" class="form-control" id="projectDescText">{{$project->description}}</textarea>
                    </div>
                    <div class="keywords-list">
                        <div class="mb-2">
                            <label>Keywords List</label>
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addKeywordsModal">Add Keywords</button>
                        </div>
                        <ul class="list-group">
                            @foreach ($project->keywords as $keyword)
                            <li class="list-group-item">{{$keyword->keyword_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection