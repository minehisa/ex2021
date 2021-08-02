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
        $models = Auth::user()->paperbasic()->get();
        return view('main', ['models'=>$models]);
    }

    // app/api.php にルート追記
    // 全論文表示
    public function get()
    {
        return response()->json(Auth::user()->paperbasic()->get());
        // $models = Auth::user()->paperbasic()->get();
        // return view('main', ['models'=>$models]);
    }

    public function add_index()
    {
        return view('paper_add');
    }

    public function add(Request $request)
    {

        return view('paper_add');
    }

    // 論文追加
    public function post(Request $request)
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

    // 論文削除
    public function delete($paperid)
    {
        Paperbasics::find($paperid)->delete();
        return response("削除しました", 200);
    }

    // 更新
    public function update(Request $request, $paperid)
    {
        $paperbasic = Paperbasics::find($paperid);
        $paperbasic->paperid = $request->paperid;
        $paperbasic->save();
        return response("OK", 200);
    }
}
