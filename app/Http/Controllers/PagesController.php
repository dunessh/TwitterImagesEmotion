<?php


namespace App\Http\Controllers;

set_time_limit(0);

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    
    public function analyze(){
        $title = 'Sentiment Analysis';
    
      
        $resp = Http::get('http://127.0.0.1:5000/webhook');
        $person = json_decode($resp,true);
        
        if($person['sentiment']>50){
            $mood = 'positive';
        }
        else{
            $mood = 'negative';
        }
           
        

       

        return view('twitter.analyze',['mood'=> $mood,'sentiment'=> $person['sentiment'],'negative'=> $person['negative'],'positive'=> $person['positive']]);
    }


}
