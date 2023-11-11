<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        // リクエストの入力内容からインスタンスをつくる
        $job = new Job($request->all());
        $job->company_id = $request->user()->id;
        $file = $request->file('image');

        $job->image = self::createFileName($file);

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 登録
            $job->save();

            // 画像アップロード
            if (!Storage::putFileAs('images/jobs', $file, $job->image)) {
                // 例外を投げてロールバックさせる
                throw new \Exception('画像ファイルの保存に失敗しました。');
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()
            ->route('jobs.show', $job);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::find($id);

        return view('jobs.show', ['job'=>$job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::find($id);

        return view('jobs.edit', ['job'=>$job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, string $id)
    {
        $job = Job::find($id);

        if ($request->user()->cannot('update', $job)) {
            return redirect()->route('posts.show', $job)
                ->withErrors('自分の記事以外は更新できません');
        }

        $file = $request->file('image');
        if ($file) {
            $delete_file_path = 'images/jobs/' . $job->image;
            $job->image = self::createFileName($file);
        }
        $job->fill($request->all());

        // トランザクション開始
        DB::beginTransaction();
        try {
            // 更新
            $job->save();

            if ($file) {
                // 画像アップロード
                if (!Storage::putFileAs('images/jobs', $file, $job->image)) {
                    // 例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの保存に失敗しました。');
                }

                // 画像削除
                if (!Storage::delete($delete_file_path)) {
                    //アップロードした画像を削除する
                    Storage::delete('images/jobs/' . $job->image);
                    //例外を投げてロールバックさせる
                    throw new \Exception('画像ファイルの削除に失敗しました。');
                }
            }

            // トランザクション終了(成功)
            DB::commit();
        } catch (\Exception $e) {
            // トランザクション終了(失敗)
            DB::rollback();
            return back()->withInput()->withErrors($e->getMessage());
        }

        return redirect()->route('jobs.show', $job)
            ->with('notice', '記事を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private static function createFileName($file)
    {
        return date('YmdHis') . '_' . $file->getClientOriginalName();
    }
}
