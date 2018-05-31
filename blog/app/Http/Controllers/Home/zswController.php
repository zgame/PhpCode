<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 17:55
 */


namespace App\Http\Controllers\Home;

//use App\Http\Model\Home\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Requests;


class zswController extends Controller
{
    //请求地址
    public function zswget(Request $request){
        $name=$request->input('user');
        $idx=$request->input('id');

//        echo "user:", $name,"    id:" , $idx;

        $array = [];
        array_push($array,$name);
        array_push($array,$idx);

//        print_r($array);

        return response()->json($array);

//        return view('home.search.index',compact('all_article','getKeyWord'));
    }
}