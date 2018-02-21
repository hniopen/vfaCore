@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Set your feature flags</h1>
        <p>
            <label>
                You can disable it completely or using the patterns seen <a
                        href="https://github.com/Atriedes/feature#a-totally-enabled-feature"
                        target="_blank">here</a>
                you can begin to modify the variants as needed.
            </label>

            <a class="btn btn-success" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('laravel-feature-flag.create_form') }}">New Feature Flag</a>

        </p>
    </section>
    <div class="clearfix"></div>
    <div class="content">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Key</td>
                        <td>Variant</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    @foreach($settings as $setting)
                        <tr>
                            <td>#{{ $setting->id }}</td>
                            <td>{{ $setting->key }}</td>
                            <td>{{ json_encode($setting->variants, JSON_PRETTY_PRINT) }}</td>
                            <td><a class="btn btn-primary" href="{{ route('laravel-feature-flag.edit_form', $setting->id) }}">Edit</a>
                                <form action="{{ route('laravel-feature-flag.delete', $setting->id) }}" method="POST"
                                      style="display: inline;"
                                      onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE"><input type="hidden"
                                                                                              name="_token"
                                                                                              value="{{ csrf_token() }}">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
