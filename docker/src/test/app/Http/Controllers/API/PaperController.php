<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Models\Paperbasics;
use App\Models\Paperdetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PaperController extends Controller
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

  public function get_paper_bootstrap(Request $request)
  {
    if (!$request->ajax()) {
      abort(404);
    }
    return response()->json(Auth::user()->paperbasic()->join('paperdetails', 'paperbasic.paperid', '=', 'paperdetails.paperid')->select('paperbasic.paperid', 'papername', 'author', 'journal', 'yearofpublic', 'updatetime', 'regittime')->paginate());
  }

  public function delete(Request $request)
  {
    // データベースから削除する処理
    //通信がajaxかチェック
    if (!$request->ajax()) {
      abort(404);
    }

    //受信パラメータを格納
    $array = $request->all();
    // $arr = json_decode($array, true);
    // $papers_json = $request->input('ids');

    if (empty($array)) {
      abort(404);
    }

    // $papers = array_column($array, 'paperid');
    foreach ($array as $index => $paper_id) {
      // User::find(Auth::id())->paperbasic();
      Auth::user()->paperbasic()->where('paperid', $paper_id)->delete();
      //clock($paper_id);
    }
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
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
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    if (!$request->ajax()) {
      abort(404);
    }

    $request->validate(
      [
        'papername' => 'required|between:1,250',
        'author' => 'required|between:1,250',
        'journal' => 'required|between:1,100',
        'yearofpublic' => 'required|integer|between:0,2100',
        'volume' => 'nullable|integer|between:0,2147483647',
        'pages' => 'nullable|max:10',
        'publisher' => 'nullable|max:100',
      ],
      [
        'papername.required' => '必須項目です．',
        'papername.between' => '1から100文字以内で入力してください．',
        'author.required' => '必須項目です．',
        'author.between' => '1から250文字以内で入力してください．',
        'journal.required' => '必須項目です．',
        'journal.between' => '1から100文字以内で入力してください．',
        'yearofpublic.required' => '必須項目です．',
        'yearofpublic.integer' => '半角で入力してください．',
        'yearofpublic.between' => '0から2100の範囲で入力してください',
        'volume.integer' => '半角で入力してください．',
        'volume.between' => '0から2147483647の範囲で入力してください．',
        'pages.max' => '0から10文字以内で入力してください．',
        'publisher.max' => '0から100文字以内で入力してください．',
      ]
    );

    $array = $request->all();
    if (empty($array)) {
      abort(404);
    }

    $paperid = $array['paperid'];
    $paper = $array['papername'];
    $author = $array['author'];
    $journal = $array['journal'];
    $yearofpublic = $array['yearofpublic'];
    $volume = $array['volume'];
    $pages = $array['pages'];
    $publisher = $array['publisher'];

    $paperbasic = Auth::user()->paperbasic()->where('paperid', '=', $paperid)->first();
    $paperbasic->paperid = $paperid;
    $paperbasic->id = Auth::id();
    // $paperbasic->updatetime = now();
    // $paperbasic->regittime = now();
    $paperbasic->save();
    $paperdetails = Paperdetail::where('paperid', '=', $paperid)->first();
    $paperdetails->paperid = $paperid;
    $paperdetails->papername = $paper;
    $paperdetails->author = $author;
    $paperdetails->journal = $journal;
    $paperdetails->yearofpublic = $yearofpublic;
    $paperdetails->volume = $volume;
    $paperdetails->pages = $pages;
    $paperdetails->publisher = $publisher;
    $paperdetails->save();

    #Create or update here
    return response()->json(['success' => '編集しました．']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
