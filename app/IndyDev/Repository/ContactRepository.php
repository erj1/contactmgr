<?php
/**
 * Created by PhpStorm.
 * User: ericjones
 * Date: 8/25/14
 * Time: 6:15 AM
 */

namespace IndyDev\Repository;

use Contact;
use IndyDev\Validator\ContactValidator;

class ContactRepository
{
    protected $validator;

    public function __construct(ContactValidator $validator)
    {
        $this->validator = $validator;
    }

    public function all()
    {
        return Contact::all();
    }

    public function get($contact_id)
    {
        return Contact::findOrFail(intval($contact_id));
    }

    public function create(array $data)
    {
        if ($this->validator->isValid($data)) {

            return Contact::create([
                'firstName' => array_get($data, 'firstName'),
                'lastName'  => array_get($data, 'lastName'),
                'birthday'  => array_get($data, 'birthday'),
                'email'     => array_get($data, 'email'),
                'phone'     => array_get($data, 'phone'),
                'street1'   => array_get($data, 'street1'),
                'street2'   => array_get($data, 'street2'),
                'city'      => array_get($data, 'city'),
                'state'     => array_get($data, 'state'),
                'zip'       => array_get($data, 'zip')
            ]);

        } else {
            return false;
        }
    }

    public function update($id, array $data)
    {
        if ($this->validator->isValid($data)) {

            $contact = Contact::findOrFail($id);

            $contact->firstName = array_get($data, 'firstName');
            $contact->lastName  = array_get($data, 'lastName', $contact->lastName);
            $contact->birthday  = array_get($data, 'birthday', $contact->birthday);
            $contact->email     = array_get($data, 'email', $contact->email);
            $contact->phone     = array_get($data, 'phone', $contact->phone);
            $contact->street1   = array_get($data, 'street1', $contact->street1);
            $contact->street2   = array_get($data, 'street2', $contact->street2);
            $contact->city      = array_get($data, 'city', $contact->city);
            $contact->state     = array_get($data, 'state'. $contact->state);
            $contact->zip       = array_get($data, 'zip', $contact->zip);

            $contact->save();

            return $contact;

        } else {
            return false;
        }
    }

    public function errors()
    {
        return $this->validator->getErrors();
    }

    public function delete($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        $contact->delete();
    }
} 