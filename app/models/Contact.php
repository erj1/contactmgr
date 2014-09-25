<?php

use Carbon\Carbon;

class Contact extends Eloquent
{
	/**
     * Table
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * Guarded
     *
     * @var array
     */
	protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Appends
     *
     * @var array
     */
    protected $appends = ['is_birthday'];


    /**
     * Get Is Birthday Attribute
     *
     * Identifies if the contact's birthday is today.
     *
     * @return boolean
     */
    public function getIsBirthdayAttribute()
    {
        if (empty($this->attributes['birthday'])) return false;

        $birthday = new Carbon($this->attributes['birthday']);
        $today    = new Carbon();


        return ($birthday->month == $today->month && $birthday->day == $today->day);
    }
}
