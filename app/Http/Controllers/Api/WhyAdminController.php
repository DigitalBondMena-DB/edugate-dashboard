<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WhySectionRequest;
use App\Http\Requests\WhyReasonRequest;
use App\Models\WhySection;
use App\Models\WhyReason;

class WhyAdminController extends Controller
{
    // SECTION (single row)
    public function getSection()
    {
        $row = WhySection::select('body')->latest('id')->first();
        return response()->json($row);
    }
    public function upsertSection(WhySectionRequest $req)
    {
        $row = WhySection::query()->latest('id')->first() ?? new WhySection();
        $data = $req->validated();
        $row->fill($data)->save();
        return response()->json(['success' => true, 'data' => $row]);
    }

    public function indexReasons()
    {
        return response()->json(WhyReason::select('id', 'title', 'body')->get());
    }
    public function storeReason(WhyReasonRequest $req)
    {
        $data = $req->validated();
        $reason = WhyReason::create($data);
        return response()->json(['success' => true, 'data' => $reason], 201);
    }
    public function updateReason(WhyReasonRequest $req, WhyReason $reason)
    {
        $data = $req->validated();
        $reason->update($data);
        return response()->json(['success' => true, 'data' => $reason]);
    }
    public function toggleReason(WhyReason $reason)
    {
        $reason->update(['is_active' => !$reason->is_active]);
        return response()->json(['is_active' => $reason->is_active]);
    }
}
