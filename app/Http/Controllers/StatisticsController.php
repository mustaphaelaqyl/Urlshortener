<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\UrlShort;
use App\Models\Statistics;
class StatisticsController extends Controller
{
    public function index(Request $request,$id){
        $shorturl = UrlShort::where("id",$id)->first();
        $stats = $shorturl->stats;
        $unique_visitor = Statistics::where('id_url', $shorturl->id)->distinct('visitor')->count('visitor');
        return Inertia("StatsList",[
            'item'=>$shorturl,
            'stats'=>$stats,
            'unique_visit'=>$unique_visitor
        ]);
    }
}
