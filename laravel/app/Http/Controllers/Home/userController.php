<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 17:55
 */


namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
//use App\Http\Model\Home\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests;


class userController extends Controller
{
    //请求地址
    public function login(Request $request){
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
        $users = DB::select("select * from user where name = ?",['zsw']);
        print_r($users);
        echo "---------------------------------\n";
//        return response()->json($users);
//        dd($array);

        return response()->json($users);

//        return view('home.search.index',compact('all_article','getKeyWord'));
    }

    public function loginp(Request $request){
        if($request->isMethod('post')){
            echo "post------------\n";
        }
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
        $users = DB::select("select * from user where name = ?",['zsw']);
        print_r($users);
        echo "---------------------------------\n";
//        return response()->json($users);
//        dd($array);

        return response()->json($users);

//        return view('home.search.index',compact('all_article','getKeyWord'));
    }
}