@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chat pet project</div>

                <div class="card-body" id="app">
                    <chat-app :user="{{ $user }}"></chat-app>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
