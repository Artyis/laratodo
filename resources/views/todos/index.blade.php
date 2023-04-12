@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks') }}</div>
                <div class=" card-header col-12">
                    <a class="btn btn-primary" href="{{ route('todos.create')}}">Create task</a>
                </div>

                @if(Session::has('alert-success'))
                    <div class="alert alert-success">
                        {{ Session::get('alert-success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>   
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(count($todos) > 0)
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $item)
                                    <tr>
                                        <td>{{ $item->title}}</td>
                                        <td>{{ $item->description}}</td>
                                        <td>
                                            @if ($item->is_completed === 0)
                                                <div class="p-3 mb-2 bg-danger text-white">do</div>
                                            @else
                                                <div class="p-3 mb-2 bg-success text-white">done</div>
                                            @endif
                                        </td>
                                        <td class="">
                                            <a href="{{ route ('todos.show', $item->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route ('todos.updTask', $item->id) }}" class="btn btn-info">Edit</a>
                                            <form method="POST" action="{{ route('todos.delete', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="delete">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="col-12">
                        <div class="p-3 mb-2 bg-danger text-white">Create your first task</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection