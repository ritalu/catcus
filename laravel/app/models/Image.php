<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Image extends Eloquent {

	/**
	 * The database table used by the modeSl.
	 *
	 * @var string
	 */
	protected $table = 'images';

    public $timestamps = false;

}
