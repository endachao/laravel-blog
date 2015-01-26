<?php

class Tags extends \Eloquent {
    protected $table = 'tags';
	protected $fillable = [];
    public $timestamps = false;
    static $rules = array(
        'name'=>'required'
    );


}