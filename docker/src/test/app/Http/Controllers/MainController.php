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

    // return view('main');

    // user icon 用 --------------
    $user_data = Auth::user();
    $email = $user_data->email;
    $number = 0;

    foreach(str_split($email) as $value){
      $number = $number + ord($value);
    }
    $colorBackground =  ($number * $number) % 360;
    if($colorBackground <= 180){
      $colorChar = "black";
    }
    else{

      $colorChar = "white";
    }
    // ------------------------------


    return view('main',compact("email", "colorBackground", "colorChar"));

  }

  // 論文追加
  public function add_paper()
  {
    // user icon 用 --------------
    $user_data = Auth::user();
    $email = $user_data->email;
    $number = 0;

    foreach(str_split($email) as $value){
      $number = $number + ord($value);
    }
    $colorBackground =  ($number * $number) % 360;
    if($colorBackground <= 180){
      $colorChar = "black";
    }
    else{

      $colorChar = "white";
    }
    // ------------------------------
    return view('paper_add',compact("email", "colorBackground", "colorChar"));
  }
  public function upload_paper(Request $request)
  {
    // date_default_timezone_set('Asia/Tokyo');

    $request->validate(
      [
        'papername' => 'required|between:1,250',
        'author' => 'required|between:1,250',
        'journal' => 'required|between:1,100',
        'yearofpublic' => 'required|integer|between:0,2100',
        'file' => 'required|mimes:pdf',
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
        'file.required' => '必須項目です．',
        'file.mimes' => 'pdfを指定してください．',
        'volume.integer' => '半角で入力してください．',
        'volume.between' => '0から2147483647の範囲で入力してください．',
        'pages.max' => '0から10文字以内で入力してください．',
        'publisher.max' => '0から100文字以内で入力してください．',
      ]
    );

    //同じ論文名があるかどうか確認
    $exists = false;
    $items = Paperbasics::select('paperid')->where('id', '=', Auth::id())->get();
    foreach ($items as $item) {
      $exists = Paperdetail::where([
        ['paperid', '=', $item->paperid],
        ['papername', '=', $request->papername]
      ])->exists();
      if ($exists) {                               //同じ論文があったとき
        break;
      }
    }

    if (!$exists) {
      $paperbasic = new Paperbasics();
      // $paperbasic->paperid;    bigincrements
      $paperbasic->id = Auth::id();
      $paperbasic->updatetime = now();
      $paperbasic->regittime = now();
      $paperbasic->save();
      $paperdetails = new Paperdetail();
      $paperdetails->papername = $request->papername;
      $paperdetails->author = $request->author;
      $paperdetails->journal = $request->journal;
      $paperdetails->yearofpublic = $request->yearofpublic;
      $paperdetails->volume = $request->volume;
      $paperdetails->pages = $request->pages;
      $paperdetails->publisher = $request->publisher;
      // PDF 保存
     // $paperdetails->paperpdf = $request->paperpdf;
      $file = $request->file('file');
      $filename = Auth::id() . '_' . $paperbasic->paperid . '_' . $request->papername . '.pdf';
      $dir = 'public/pdf/';
      $file->storeAs($dir, $filename, ['disk' => 'local']);
      $paperdetails->paperpdf = $filename;

      $paperdetails->save();
    }

    // dropzpne
    // $file = $request->file('file');
    // $filename = $file->getClientOriginalName();
    // $file->move(public_path('pdf'), $filename);

    // user icon 用 --------------
    $user_data = Auth::user();
    $email = $user_data->email;
    $number = 0;

    foreach(str_split($email) as $value){
      $number = $number + ord($value);
    }
    $colorBackground =  ($number * $number) % 360;
    if($colorBackground <= 180){
      $colorChar = "black";
    }
    else{

      $colorChar = "white";
    }
    // ------------------------------

    return view('main', compact("data", "email", "colorBackground", "colorChar"));
  }


  // 論文詳細
  public function detail($paperid)
  {
    $data = Paperdetail::find($paperid);

    // return view('paper_detail', compact("data"));


    // user icon 用 --------------
    $user_data = Auth::user();
    $email = $user_data->email;
    $number = 0;



    foreach(str_split($email) as $value){
      $number = $number + ord($value);
    }
    $colorBackground =  ($number * $number) % 360;
    if($colorBackground <= 180){
      $colorChar = "black";
    }
    else{

      $colorChar = "white";
    }
    // ------------------------------

    return view('paper_detail', compact("data", "email", "colorBackground", "colorChar"));
  }
}
