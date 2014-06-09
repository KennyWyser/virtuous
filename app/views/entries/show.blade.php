@extends('layouts.master')
@section('content')


<div class="col-md-6 col-md-push-3 text-center">

			<h1>{{ $entry->date->toFormattedDateString() }}</h1>
			<hr/>
			<p>{{ $entry->content }}</p>
			<p>{{ link_to_route('entries.edit', 'Edit this Entry', $entry->id) }}</p>
			<p>{{ link_to_route('entries.destroy', 'Delete this Entry', $entry->id) }}</p>

</div>

@stop