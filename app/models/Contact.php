<?php

use Carbon\Carbon;

class Contact extends Eloquent
{
	protected $table = 'contacts';

	protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['is_birthday'];

    public function getIsBirthdayAttribute()
    {
        if (empty($this->attributes['birthday'])) return false;

        $birthday = new Carbon($this->attributes['birthday']);
        $today    = new Carbon();

        return ($today->diffInDays($birthday) == 0);
    }
}
