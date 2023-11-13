<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreskillRequest;
use App\Http\Requests\UpdateskillRequest;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Portfolio $portfolio)
    {
        return view('skills.create', compact('portfolio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $portfolio = Portfolio::where('user_id', Auth::id())->get();
        $skill = new Skill($request->all());
        $skill->portfolio_id = $portfolio[0]->id;
        // 登録
        $skill->save();

        return redirect()
            ->route('portfolios.show', $portfolio[0])
            ->with('notice', 'コメントを登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateskillRequest $request, skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(skill $skill)
    {
        //
    }
}
