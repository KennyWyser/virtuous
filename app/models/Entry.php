<?php

class Entry extends \Eloquent {
	protected $fillable = ['date', 'content'];

	protected $table = 'entries';

	public function getDates()
	{
    return array('created_at', 'updated_at', 'date');
	}

}