@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create form') }}
                </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                
                        <form class="row g-3 needs-validation" method="POST" action="{{ route('todos.update')}}" novalidate>
                            @csrf
                                <div class="col-md-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" required></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                    <option selected value="0">Do</option>
                                    <option value="1">Done</option>
                                    </select>
                                </div>
                                <input type="hidden" name=user_id value="{{ auth()->user()->id }}">
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Сreate</button>
                                </div>
                            </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection