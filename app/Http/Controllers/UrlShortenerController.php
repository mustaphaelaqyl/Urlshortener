<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\UrlShort;
use App\Models\Statistics;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use IntlChar;
use Illuminate\Support\Facades\DB;

class UrlShortenerController extends Controller
{
    public function index(){
        // $urlshort = UrlShort::orderByDesc('id')->get();
        // $visitedlink = UrlShort::select('shortCode')->orderBy("visits","DESC")->first();
        // $mostvisited =  $visitedlink->shortCode ? config('app.url') . '/' .$visitedlink->shortCode : 'NONE';
        // return Inertia("Index",['data'=>$urlshort,'mostvisited'=>$mostvisited]);
        // $mostvisited =  $visitedlink ? config('app.url') . '/' .$visitedlink->shortCode : 'None';

        $mosted_visitedLink = UrlShort::find(Statistics::select('id_url', DB::raw('COUNT(*) as count'))->groupBy('id_url')->orderBy('count','Desc')->first());
        $mostvisited = $mosted_visitedLink ? 'http://'.$_SERVER['HTTP_HOST']. '/' .$mosted_visitedLink[0]->shortCode : 'None';
        $urlshort =UrlShort::withCount('stats')->latest()->get();
        // $alldata = UrlShort::all();
        // $visitedlink=UrlShort::select('shortCode')->orderBy("counter","DESC")->first();
      
        return Inertia("Index",['data'=>$urlshort,'mostvisited'=>$mostvisited]);
    }
    public function create(){
        return Inertia("Urlshortener");
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
        $shortUrl = $this->generateShortUrl();

        UrlShort::create([
            'longUrl' => $request->url,
            'shortCode' => $shortUrl,
            'counter'=> 0,
            'ipAddress' => $request->ip(),
        ]);
        // return response()->json(['message' => 'URL shortened successfully!', 'shortUrl' => $shortUrl]);
        return redirect()->route('urlshortener.index')->with('message', 'URL shortened successfully!');
    }
    public function redirec($shortUrl,Request $request)
    {
        $url = UrlShort::where('shortCode', $shortUrl)->firstOrFail();
        if(!$url){
            return redirect()->route('urlshortener.index')->with('errors', 'This short Url cannot find');
        }else{
            $Statistics = new Statistics();
            $Statistics->visitor = $request->ip();
            $Statistics->id_url = $url->id;
            $Statistics->save();
            $url->increment("counter");
            return redirect($url->longUrl);
        }
        // $url->increment('visits');
       
    }

    //methode unique code URL
    protected function checkifCodeExists(string $value)
    {
        return UrlShort::where('shortCode', $value)->exists();
    }
    private function generatecodeRandom(int $length = 6)
    {
        $string = Str::random($length);
        return $string;
    }
    protected function generateShortUrl()
    {
        $code = $this->generatecodeRandom();
        $alreadyExists = $this->checkifCodeExists($code);

        while ($alreadyExists) {
            $code = $this->generatecodeRandom();
            $alreadyExists = $this->checkifCodeExists($code);
        }
        return $code;
    }
}
