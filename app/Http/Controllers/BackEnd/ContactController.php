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

        return view('dashboard.feedback.index', compact('rows'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Contact::findorFail($id);

        return view('dashboard.feedback.show', compact('feedback'));
    }
}
