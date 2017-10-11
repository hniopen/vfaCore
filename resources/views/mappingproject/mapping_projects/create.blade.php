@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mapping Project
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'mappingproject.mappingProjects.store']) !!}

                        @include('mappingproject.mapping_projects.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
