<?php

namespace App\Http\Controllers\BackEnd;

use App\AdFormAreas;
use App\AdFormCountries;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdFormArea extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $adFormCountry = AdFormCountries::findorFail($id);

        return view('backend.ad_form_areas.create', compact('adFormCountry'));
        
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
            'ar_name' => 'required',
            'ad_form_countries_id' => 'required|integer'
        ]);

        $adFormCountry = AdFormCountries::findorFail($request->ad_form_countries_id);

        $adFormCountry->adFormAreas()->create([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'ad_form_countries_id' => $request->ad_form_countries_id
        ]);

        Session::flash('flash_message', 'Area added successfully!');
        return redirect()->route('ad-form-areas.show', $adFormCountry->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adFormCountry = AdFormCountries::findorFail($id);

        $rows = $adFormCountry->adFormAreas()->paginate(10);

        return view('backend.ad_form_areas.index', compact('adFormCountry', 'rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = AdFormAreas::findorFail($id);

        $adFormCountry = AdFormCountries::findorFail($row->ad_form_countries_id);

        return view('backend.ad_form_areas.edit', compact('row', 'adFormCountry'));
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
        $this->validate($request, [
            'en_name' => 'required',
            'ar_name' => 'required',
            'ad_form_countries_id' => 'required|integer'
        ]);

        $row = AdFormAreas::findorFail($id);

        $adFormCountry = AdFormCountries::findorFail($row->ad_form_countries_id);

        $row->update([
            'en_name' => $request->en_name,
            'ar_name' => $request->ar_name,
            'ad_form_countries_id' => $request->ad_form_countries_id
        ]);

        Session::flash('flash_message', 'Area updated successfully!');
        return redirect()->route('ad-form-areas.show', $adFormCountry->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = AdFormAreas::findorFail($id);

        $adFormCountry = AdFormCountries::findorFail($row->ad_form_countries_id);

        $row->delete();

        Session::flash('flash_message', 'Area deleted successfully!');
        return redirect()->route('ad-form-areas.show', $adFormCountry->id);
    }
}
