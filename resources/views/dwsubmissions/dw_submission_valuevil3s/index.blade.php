@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dw Submission Valuevil3S</h1>
        @if(View::exists('dwsubmissions.dw_submission_valuevil3s.create'))
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dwsubmissions.dwSubmissionValuevil3s.create') !!}">Add New</a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('dwsubmissions.dw_submission_valuevil3s.table')
            </div>
        </div>
    </div>
@endsection

