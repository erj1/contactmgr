<?php
/**
 * Created by PhpStorm.
 * User: ericjones
 * Date: 8/25/14
 * Time: 6:41 AM
 */

namespace IndyDev\Validator;


class ContactValidator extends Validator {

    protected static $rules = [
        'firstName' => 'required|max:255',
        'lastName'  => 'max:255',
        'birthday'  => 'date',
        'email'     => 'email|max:255',
        'phone'     => 'max:255',
        'street1'   => 'max:255',
        'street2'   => 'max:255',
        'city'      => 'max:255',
        'state'     => 'max:255',
        'zip'       => 'max:255'
    ];

} 