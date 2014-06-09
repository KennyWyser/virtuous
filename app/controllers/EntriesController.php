<?php

class EntriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /entries
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Entry::all();
		return View::make('entries.index', ['entries' => $entries]);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /entries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('entries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /entries
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$validation = Validator::make(['content' => Input::get('content')],['content' =>'required|min:5']);

		if ($validation->passes()) {

			$entry = new Entry;
			$entry->date = date("Y-m-d");
			$entry->content = Input::get('content');

			$entry->save();

			return Redirect::route('entries.index');
		}

		else {

			return Redirect::route('entries.create')->withErrors($validation);
		}

	}

	/**
	 * Display the specified resource.
	 * GET /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$entry = Entry::findOrFail($id);

		return View::make('entries.show', compact('entry'));

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /entries/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$entry = Entry::findOrFail($id);
		return View::make('entries.edit', compact('entry'));

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$entry = Entry::find($id);
		$entry->date = date("Y-m-d");
		$entry->content = Input::get('content');

		$entry->save();

		return Redirect::route('entries.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$entry = Entry::find($id);

		$entry->delete();

		return Redirect::route('entries.index');

	}

}