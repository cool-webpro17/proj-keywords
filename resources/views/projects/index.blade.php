@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-{{session('message.status')}}" role="alert">
                    {{session('message.content')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Projects Table</div>
                <div class="card-body p-0">
                    <div class="actions p-2">
                        <a class="btn btn-primary" href="{{route('projects.create')}}">Create</a>
                    </div>
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($projects->isEmpty())
                            <tr><td align="center" colspan="4">No Data in table</td></tr>
                        @else
                            @foreach($projects as $project)
                                <tr>
                                    <th scope="row">{{$project->id}}</th>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->description}}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{route('projects.show', ['id' => $project->id])}}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
