@extends('layouts.master')
@section('content')


<div class="col-md-6 col-md-push-3 text-center">
	<h2>Your Entries:</h2>
	<hr>

	@if ($entries)

		@foreach ($entries as $entry)

			<h1>{{ link_to_route('entries.show', $entry->date->toFormattedDateString(), $entry->id) }}</h1>
			<hr/>
			<p>{{ $entry->content }}</p>

		@endforeach

	@else	
	<p>There are no entries</p>

	@endif

	{{ link_to_route('entries.create', 'Add New Entry', null, ['class' => 'btn btn-primary']) }}

</div>

@stop