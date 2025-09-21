<?php

namespace App\Http\Controllers\BackEnd;

use App\AdFormCountries;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdFormCountry extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = AdFormCountries::latest()->paginate(10);

        return view('backend.ad_form_countries.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ad_form_countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'en_name' => 'required',
            'ar_name' => 'required'
        ]);

        AdFormCountries::create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'slug' => Str::slug($request->en_name)
        ]);

        Session::flash('flash_message', 'Country added successfully!');
        return redirect()->route('ad-form-countries.index');
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
        $row = AdFormCountries::findorFail($id);

        return view('backend.ad_form_countries.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $adFormCountry = AdFormCountries::findorFail($id);

        $this->validate($request, [
            'en_name' => 'required',
            'ar_name' => 'required'
        ]);

        $adFormCountry->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'slug' => Str::slug($request->en_name)
        ]);

        Session::flash('flash_message', 'Country updated successfully!');
        return redirect()->route('ad-form-countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adFormCountry = AdFormCountries::findorFail($id);

        $adFormCountry->delete();

        Session::flash('flash_message', 'Country deleted successfully!');
        return redirect()->route('ad-form-countries.index');
    }
}
