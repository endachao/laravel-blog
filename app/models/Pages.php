<?php

class Pages extends \Eloquent {
	protected $fillable = [];
    protected $table = 'pages';
    public $timestamps = false;
    static $rules = array(
        'title'=>'required',
        'content'=>'required',
    );
}