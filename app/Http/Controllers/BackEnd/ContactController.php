<?php

namespace App\Http\Controllers\BackEnd;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $rows = Contact::latest()->paginate(10);

        return view('backend.feedback.index', compact('rows'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Contact::findorFail($id);

        return view('backend.feedback.show', compact('row'));
    }
}
