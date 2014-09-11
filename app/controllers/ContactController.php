<?php

use IndyDev\Repository\ContactRepository;

class ContactController extends \BaseController {

    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contacts = $this->contact->all();
        return Response::json($contacts);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$contact = $this->contact->create(Input::all());
        return ($contact)
            ? Response::json($contact, 201)
            : Response::json($this->contact->errors()->first(), 400);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contact = $this->contact->get($id);
        return Response::json($contact);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $contact = $this->contact->update($id, Input::all());
        return ($contact)
            ? Response::json($contact, 200)
            : Response::json($this->contact->errors()->first(), 400);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->contact->delete($id);
        return Response::json('Deleted', 200);
	}


}
