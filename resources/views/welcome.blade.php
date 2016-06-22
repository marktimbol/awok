@extends('layouts.app')

@section('header_styles')
    <link rel="stylesheet" href="{{ elixir('css/flash.css') }}" />
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Pages.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
    <script src="{{ elixir('js/flash.js') }}"></script>
    @include('flash')
@endsection


