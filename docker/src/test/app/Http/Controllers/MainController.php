<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Paperbasics;
use App\Models\Paperdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
  public function index()
  {
    return view('main');
  }

  // 論文追加
  public function add_paper()
  {
    return view('paper_add');
  }
  public function upload_paper(Request $request)
  {
    // date_default_timezone_set('Asia/Tokyo');

    $request->validate(
      [
        'papername' => 'required',
        'author' => 'required',
        'journal' => 'required',
        'yearofpublic' => 'required',
        'file' => 'required'
      ],
      [
        'papername.required' => '必須項目です．',
        'author.required' => '必須項目です．',
        'journal.required' => '必須項目です．',
        'yearofpublic.required' => '必須項目です．',
        'file.required' => '必須項目です．'
      ]
    );

    $paperbasic = new Paperbasics();
    $paperbasic->id = Auth::id();
    $paperbasic->updatetime = now();
    $paperbasic->regittime = now();
    $paperbasic->save();
    $paperdetails = new Paperdetail();
    $paperdetails->papername = $request->papername;
    $paperdetails->author = $request->author;
    $paperdetails->journal = $request->journal;
    $paperdetails->yearofpublic = $request->yearofpublic;
    // PDF 保存
    // $paperdetails->paperpdf = $request->paperpdf;
    $file = $request->file('file');
    $filename = Auth::id() . '_' . $paperbasic->paperid . '_' . $request->papername . '.pdf';
    $dir = 'public';
    $file->storeAs($dir, $filename, ['disk' => 'local']);
    $paperdetails->paperpdf = $filename;

    $paperdetails->save();

    // dropzpne
    // $file = $request->file('file');
    // $filename = $file->getClientOriginalName();
    // $file->move(public_path('pdf'), $filename);
    return view('paper_add');
  }


  // 論文詳細
  public function detail($paperid)
  {
    $data = Paperdetail::find($paperid);
    return view('paper_detail', compact("data"));
  }
}
