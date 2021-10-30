<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Models\Paperbasics;
use App\Models\Paperdetail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

  public function get_paper_vue(Request $request)
  {
    if (!$request->ajax()) {
      abort(404);
    }
    return response()->json(Auth::user()->paperbasic()->join('paperdetails', 'paperbasic.paperid', '=', 'paperdetails.paperid')->select('paperbasic.paperid', 'papername', 'updatetime', 'regittime')->get());
  }

  public function get_paper_bootstrap(Request $request)
  {
    if (!$request->ajax()) {
      abort(404);
    }
    return response()->json(Auth::user()->paperbasic()->join('paperdetails', 'paperbasic.paperid', '=', 'paperdetails.paperid')->select('paperbasic.paperid', 'papername', 'updatetime', 'regittime')->paginate());
  }

  public function delete(Request $request)
  {
    // データベースから削除する処理
    //通信がajaxかチェック
    if (!$request->ajax()) {
      abort(404);
    }

    //受信パラメータが存在するかチェック
    // if (empty($this->request->data['hogege']) || empty($this->request->data['fugaga'])) {
    //   abort(404);
    // }

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
      clock($paper_id);
    }

    //結果を返却
    // $result['status'] = "ok";
    // $result['msg'] = "無事受信完了しました！";
    // $this->set(compact('result'));
    // $this->set('_serialize', ['result']);
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
  public function update(Request $request, $id)
  {
    //
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
