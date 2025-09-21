<?php

namespace App\Http\Controllers\BackEnd;

use App\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\dashboard\StoreClientsRequest;
use App\Http\Requests\dashboard\UpdateClientsRequest;

class ClientsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Client::select('id', 'en_name', 'ar_name', 'logo', 'active')->latest()->paginate(10);

        return view('dashboard.clients.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientsRequest $request)
    {
        $requestArray = $request->all();

        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('clients'), $fileName);
        }

        $requestArray = ['logo' => $fileName] + $request->all();

        $row = Client::create($requestArray);

        Session::flash('flash_message', 'Client added successfully');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Client::findorFail($id);

        return view('dashboard.clients.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientsRequest $request, $id)
    {
        $clients = Client::findorFail($id);

        $requestArray = $request->all();

        if($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time().Str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('clients'), $fileName);

            if($clients->logo !== NULL) {
                if(file_exists(public_path('clients/'. $clients->logo))) {
                    unlink(public_path('clients/'. $clients->logo));
                }
            }
        }
        $requestArray = ['logo' => $request->hasFile('logo') ? $fileName: $clients->logo] + $request->all();

        $clients->update($requestArray);

        Session::flash('flash_message', 'Client updated successfully');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Client::findorFail($id);

        if($clients->logo !== NULL) {
            if(file_exists(public_path('clients/'. $clients->logo))) {
                unlink(public_path('clients/'. $clients->logo));
            }
        }

        $clients->delete();

        Session::flash('flash_message', 'Client deleted successfully');
        return redirect()->route('clients.index');
    }

    public function toggleStatus(Client $client)
    {
        $client->active = $client->active === 'activated' ? 'deactivated' : 'activated';
        $client->save();
        Session::flash('flash_message', "Client {$client->active} successfully.");
        return redirect()->route('clients.index');
    }
}
