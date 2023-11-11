<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        return view('portfolios.show', compact('portfolio'));
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
        if ($request->user()->cannot('update', $portfolio)) {
            return redirect()->route('portfolios.show', $portfolio)
                ->withErrors('自分の記事以外は更新できません');
        }

        $file = $request->file('image');
        if ($file) {
            $delete_file_path = 'images/portfolios/' . $portfolio->image;
            $portfolio->image = date('YmdHis') . '_' . $file->getClientOriginalName();
        }
        $portfolio->fill($request->all());

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 更新
            $portfolio->save();

            if ($file) {
                // 画像アップロード
                if (!Storage::putFileAs('images/portfolios', $file, $portfolio->image)) {
                    // 例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの保存に失敗しました。');
                }

                // 画像削除
                if ($delete_file_path !== 'images/portfolios/'){
                    if (!Storage::delete($delete_file_path)) {
                        //アップロードした画像を削除する
                        Storage::delete('images/portfolios/' . $portfolio->image);
                        //例外を投げてロールバックさせる
                        throw new \Exception('画像ファイルの削除に失敗しました。');
                    }
                }
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()->route('portfolios.show', $portfolio)
            ->with('notice', '記事を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
