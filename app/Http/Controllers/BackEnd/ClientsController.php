<?php

namespace App\Http\Controllers\BackEnd;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Backend\StoreClientsRequest;
use App\Http\Requests\Backend\UpdateClientsRequest;
use App\Services\ImageService;

class ClientsController extends Controller
{
    protected $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $rows = Client::select('id', 'en_name', 'ar_name', 'logo', 'active')->latest()->paginate(10);
        return view('dashboard.clients.index', compact('rows'));
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }


    public function store(StoreClientsRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageService->handle($request->file('logo'), 'clients', null);
        }
        Client::create($data);
        Session::flash('flash_message', 'Partner added successfully');
        return redirect()->route('clients.index');
    }


    public function edit($id)
    {
        $row = Client::findorFail($id);
        return view('dashboard.clients.edit', compact('row'));
    }

    public function update(UpdateClientsRequest $request, Client $client)
    {

        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageService->handle($request->file('logo'), 'clients', $client->logo ?? null);
        }

        $client->update($data);
        Session::flash('flash_message', 'Client updated successfully');
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
