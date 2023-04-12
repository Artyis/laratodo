@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View') }}
                </div>
                    <div class="card-body">
                        <div class="row g-3">
                                <div class="col-md-4">
                                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Go back</a>
                                </div>
                                <div class="col-md-4">
                                    <p>Title: {{ $task->title }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p>Description: {{ $task->description }}</p>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection