<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KpProposal;

class ProposalKPCariController extends Controller
{
    public function show(Request $request)
    {
        $this->validate($request, ['keyword' => 'required']);

        $keyword = $request->input('keyword');
        $filter = '%'.$keyword.'%';

        $kp_proposals = KpProposal::where('judul', 'like', $filter)
            ->paginate(25);

        return view('backend.proposal-kp.index', compact('kp_proposals', 'keyword'));

    }
}
