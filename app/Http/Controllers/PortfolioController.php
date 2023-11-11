<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('portfolios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $portfolio = new Portfolio();
        // ログイン中のユーザーのIDを取得して代入
        $portfolio->user_id = Auth::id();

        // トランザクション開始
        DB::beginTransaction();
        try {
            $portfolio->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();     // ミスったらロールバック

            // backで直前のページ(create.blade.php)にリダイレクトする
            // withInputで入力した値を渡す
            // withErrorsでエラーオブジェクトにエラーメッセージを追加する
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect(route('portfolios.edit', $portfolio));
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
