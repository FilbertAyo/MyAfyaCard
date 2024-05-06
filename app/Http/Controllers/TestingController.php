<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(){

//         $data=Test::select ('id', 'created_at' )->get()->groupBy (function($data) {
// return Carbon::parse($data->created_at)->format('M');
// });
// $months=[];
// $monthCount=[];
// foreach ($data as $month => $values){
// $months[]=$month;
// $monthCount[]=count($values);

// }

$data=Test::select ('created_at','weight' )->get();

$formattedData = $data->map(function($item){
return [
    'x'=>Carbon::parse($item->created_at)->format('M/d'),
    'y'=>$item->weight
];
});
return view('testing', ['data'=>$formattedData]);
        // return view('testing');
    }
}
