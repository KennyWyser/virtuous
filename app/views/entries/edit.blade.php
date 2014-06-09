@extends('layouts.master')
@section('content')

<h2>{{ date("F j" . ", " . "Y") }}</h2>
	<hr>

<div class="col-md-6 col-md-push-3">

	{{Form::model($entry, ['method' => 'PATCH', 'route' => ['entries.update', $entry->id]])}}

		<div class="form-group">
			{{Form::label('content', 'What Virtuous Things Did You Do Today?')}}
			{{Form::textarea('content', null, ['class' => 'form-control'])}}
		</div>

		<div class="form-group">
			{{Form::submit('Update Entry', ['class' => 'btn btn-primary'])}}
		</div>

	{{Form::close()}}
</div>

@stop