

<li class="{{ Request::is('dwSubmissionregs*') ? 'active' : '' }}">
    <a href="{!! route('dwsubmissions.dwSubmissionregs.index') !!}"><i class="fa fa-edit"></i><span>Dw Submissionregs</span></a>
</li>

<li class="{{ Request::is('dwSubmissionValueregs*') ? 'active' : '' }}">
    <a href="{!! route('dwsubmissions.dwSubmissionValueregs.index') !!}"><i class="fa fa-edit"></i><span>Dw Submission Valueregs</span></a>
</li>
<li class="{{ Request::is('dwSubmissionvils*') ? 'active' : '' }}">
    <a href="{!! route('dwsubmissions.dwSubmissionvils.index') !!}"><i class="fa fa-edit"></i><span>Dw Submissionvils</span></a>
</li>

<li class="{{ Request::is('dwSubmissionValuevils*') ? 'active' : '' }}">
    <a href="{!! route('dwsubmissions.dwSubmissionValuevils.index') !!}"><i class="fa fa-edit"></i><span>Dw Submission Valuevils</span></a>
</li>

<li class="{{ Request::is('dwSubmission172s*') ? 'active' : '' }}">
    <a href="{!! route('dwsubmissions.dwSubmission172s.index') !!}"><i class="fa fa-edit"></i><span>Dw Submission172S</span></a>
</li>

<li class="{{ Request::is('dwSubmissionValue172s*') ? 'active' : '' }}">
    <a href="{!! route('dwsubmissions.dwSubmissionValue172s.index') !!}"><i class="fa fa-edit"></i><span>Dw Submission Value172S</span></a>
</li>

