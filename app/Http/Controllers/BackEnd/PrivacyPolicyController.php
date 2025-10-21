<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index() {
        $data = PrivacyPolicy::select('en_content', 'ar_content')->firstOrFail();
        return view('dashboard.privacy_policy.index' , compact('data'));
    }

    public function edit() {
        $data = PrivacyPolicy::firstOrFail();
        return view('dashboard.privacy_policy.edit', compact('data'));
    }

    public function update(Request $request) {
        $privacyPolicy = PrivacyPolicy::firstOrFail();
        $data = $request->validate([
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
        ]);

        $privacyPolicy->update($data);
        session()->flash('success', 'Privacy Policy updated successfully');
        return redirect()->route('privacy-policy.index');
    }
}
