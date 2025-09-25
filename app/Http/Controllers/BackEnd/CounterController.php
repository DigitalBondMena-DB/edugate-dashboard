<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CounterController extends Controller
{
    public function index() {
        $counters = Counter::select('id', 'title_ar', 'title_en', 'count')->get();
        return view('dashboard.counters.index', compact('counters'));
    }

    public function edit(Counter $counter) {
        return view('dashboard.counters.edit', compact('counter'));
    }

    public function update(Request $request, Counter $counter) {
        $data = $request->validate([
            'title_ar' => 'required|string|max:100',
            'title_en' => 'required|string|max:100',
            'count' => 'required|integer',
        ]);

        $counter->update($data);

        return redirect()->route('counters.index');
    }
}
