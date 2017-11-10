{!! Form::open(['route' => ['dwsubmissions.dwSubmissionValuevils.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('dwsubmissions.dwSubmissionValuevils.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @if(View::exists('dwsubmissions.dw_submission_valuevils.create'))
        <a href="{{ route('dwsubmissions.dwSubmissionValuevils.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    @endif
</div>
{!! Form::close() !!}
