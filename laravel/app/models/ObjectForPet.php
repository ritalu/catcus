<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ObjectForPet extends Eloquent {

	/**
	 * The database table used by the modeSl.
	 *
	 * @var string
	 */
	protected $table = 'objectforpet';

    public $timestamps = false;
}
