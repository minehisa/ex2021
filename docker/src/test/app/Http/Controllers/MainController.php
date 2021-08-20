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


    public function add_index()
    {
        return view('paper_add');
    }

    // 論文追加
    public function add_paper(Request $request)
    {
        $paperbasic = new Paperbasics();
        // $paperbasic->paperid;    bigincrements
        $paperbasic->id = Auth::id();
        $paperbasic->updatetime = now();
        $paperbasic->regittime = now();
        $paperbasic->save();
        $paperdetails = new Paperdetail();
        $paperdetails->papername = $request->title;
        $paperdetails->author = $request->author;
        $paperdetails->journal = $request->journal;
        $paperdetails->yearofpublic = $request->year;
        $paperdetails->save();
        // return response("登録しました", 200);
        return view('paper_add');
    }


    // 論文詳細
    public function detail($paperid)
    {
        $data = Paperdetail::find($paperid);
        return view('paper_detail', compact("data"));
    }
}
