<table class="table table-responsive" id="dwProjects-table">
    <thead>
        <tr>
            <th>Id</th>
        <th>Questcode</th>
        <th>Submissiontable</th>
        <th>Parentid</th>
        <th>Comment</th>
        <th>Isdisplayed</th>
        <th>Xformurl</th>
        <th>Credential</th>
        <th>Entitytype</th>
        <th>Formtype</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dwProjects as $dwProject)
        <tr>
            <td>{!! $dwProject->id !!}</td>
            <td>{!! $dwProject->questCode !!}</td>
            <td>{!! $dwProject->submissionTable !!}</td>
            <td>{!! $dwProject->parentId !!}</td>
            <td>{!! $dwProject->comment !!}</td>
            <td>{!! $dwProject->isDisplayed !!}</td>
            <td>{!! $dwProject->xformUrl !!}</td>
            <td>{!! $dwProject->credential !!}</td>
            <td>{!! $dwProject->entityType !!}</td>
            <td>{!! $dwProject->formType !!}</td>
            <td>
                {!! Form::open(['route' => ['dwsync.dwProjects.destroy', $dwProject->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dwsync.dwProjects.show', [$dwProject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dwsync.dwProjects.edit', [$dwProject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>