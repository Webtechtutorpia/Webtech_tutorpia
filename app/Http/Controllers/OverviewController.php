<?php

namespace Tutorpia\Http\Controllers;

use Illuminate\Http\Request;
use Tutorpia\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Tutorpia\OverviewModel;

class OverviewController extends Controller
{

    public function getAllActifitys()
    {

        //frage multiple Arrays

        $actifitys = DB::table("Actifity")->select('Name')->get();
        foreach ($actifitys as $actifity) {
            $model = new OverviewModel("", $actifity->Name);
            $contactModels[] = $model;
        }

        return $actifitys;
    }

    public function getfirstActifity()
    {
       // $actifity = DB::table("Actifity")->select('Name')->where('id', 1)->first();
        //return als array?
        $actifity='Bauernhof';
        return $actifity;
    }

    public function showfirstActifty()
    {
        //$actifity ein array?

       $actifity = $this->getfirstActifity();
       $parameters =['actifity'=> $actifity , 'test'=> 'test'];
       return view('home', $parameters);
    }


}
