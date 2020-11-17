<?php


namespace App\Http\Controllers\PortiaShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class portiaController extends Controller
{
    public function getUserBuyList(Request $request){
        $name=$request->input('user');
        $idx=$request->input('id');
        echo "---------------------------------\n";
        $outt= "user:". $name."    id:" . $idx;
//        dd($outt);
        print_r($outt);
        print_r("\n");

        echo "---------------------------------\n";
        $array = [];
        array_push($array,$name);
        array_push($array,$idx);
        print_r($array);
        echo "---------------------------------\n";
        $users = DB::select("select * from userinfo where uid = ?",['2222']);
        print_r($users);
        echo "---------------------------------\n";
//        return response()->json($users);
//        dd($array);

        return response()->json($users);

//        return view('home.search.index',compact('all_article','getKeyWord'));
    }

}
