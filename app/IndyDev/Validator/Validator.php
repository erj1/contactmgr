<?php
/**
 * Created by PhpStorm.
 * User: ericjones
 * Date: 8/25/14
 * Time: 6:38 AM
 */

namespace IndyDev\Validator;

use Validator as V;

abstract class Validator {

    protected $errors;

    public function isValid(array $data)
    {
        $validator = V::make($data, static::$rules);

        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
} 