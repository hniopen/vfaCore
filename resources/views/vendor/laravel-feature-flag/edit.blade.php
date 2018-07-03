@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>FeatureFlag / Edit</h1>
    </section>
    <div class="clearfix"></div>
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('laravel-feature-flag.update', $flag->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @include('laravel-feature-flag::form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_javascript')
    <script language="JavaScript">
        $(document).ready(function () {


        });
    </script>
@endsection
