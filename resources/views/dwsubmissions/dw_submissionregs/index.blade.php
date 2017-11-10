@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dw Submissionregs</h1>
        @if(View::exists('dwsubmissions.dw_submissionregs.create'))
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('dwsubmissions.dwSubmissionregs.create') !!}">Add New</a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('dwsubmissions.dw_submissionregs.table')
            </div>
        </div>
    </div>
@endsection

