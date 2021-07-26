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

    // 論文追加
    public function post(REquest $request)
    {
        // まだ途中
        $paperbasic = new Paperbasics();
        $paperbasic->paperid;
        $paperbasic->id = Auth::id();
        $paperdetails = new Paperdetail();
        $paperdetails->papernname;
        $paperdetails->author;
        $paperdetails->journal;
        $paperdetails->yearofpublic;
        $paperbasic->save();
        $paperdetails->save();
        return response("登録しました", 200);
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
