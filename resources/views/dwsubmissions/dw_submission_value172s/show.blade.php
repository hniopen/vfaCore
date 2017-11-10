@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dw Submission Value172
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('dwsubmissions.dw_submission_value172s.show_fields')
                    <a href="{!! route('dwsubmissions.dwSubmissionValue172s.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
