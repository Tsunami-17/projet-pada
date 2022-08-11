<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class formVoieController extends Controller
{
    function index()
    {
        $commune_list = DB::table('toponymes')
                        ->select("id", "commune")
                        ->distinct('commune')
                        ->get();
        return view('pages.denomination')->with('commune_list',$commune_list);
    }

    function fetch(Request $request)
    {
        $select    = $request->get('select');
        $value     = $request->get('value');
        $dependent = $request->get('dependent');
        if ($value == 'TOUS')
        {
            $data  = DB::table('toponymes')
                    ->select($dependent)
                    ->distinct($dependent)
                    ->whereNull('gid_ati')
                    ->whereNotnull($dependent)
                    ->orderBy($dependent,'asc')
                    ->get();
            $output = '<option value="">TOUS</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }
            echo $output;
        }else{
            $data = DB::table('toponymes')
                ->select($dependent)
                ->distinct($dependent)
                ->where($select, $value)
                ->whereNotnull($dependent)
                ->whereNull('gid_ati')
                ->orderBy($dependent,'asc')
                ->get();
            $output = '<option value="">TOUS</option>';
            foreach($data as $row)
            {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }
            echo $output;
        }

    }

    function typevoie (Request $request)
    {
        $select    = $request->get('select');
        $value     = $request->get('value');
        $dependente = $request->get('dependente');

        $data      = DB::table('voirie_pada')
                    ->select($dependente)
                    ->distinct($dependente)
                    ->where($select, $value)
                    ->get();

        $output = '<option value="voirie_pada">voirie pada</option>';
        foreach($data as $row)
        {
            $output .= '<option value="pada:'.strtolower(str_replace(" ","_",trim($row->$dependente))).'">'.$row->$dependente.'</option>';
        }
        echo $output;
    }

    function voie (Request $request)
    {
        $select    = $request->get('select');
        $valueCom     = $request->get('valueCom');
        $id_voie   = "id_voie";
        $new_name  = "new_name";
        $typevoie  = $request->get('typevoie');
        $typevoie  = str_replace("_"," ",ucfirst($typevoie));

        $data      = DB::table('voirie_pada')
                    ->select("id_voie","new_name")
                    ->where($select, $valueCom)
                    ->where('fclass','ilike', "%$typevoie%")
                    ->get();

        $output = '<option value=""></option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$id_voie.'">'.$row->$id_voie.' - '.$row->$new_name.'</option>';
        }
        echo $output;
    }

    function fetchtypo(Request $request)
    {
        $select    = $request->get('select');
        $value     = $request->get('value');
        $comValue  = $request->get('comValue');
        $dependent = $request->get('dependent');
        if ($value == 'TOUS')
        {
            $data = DB::table('toponymes')
                ->select($dependent)
                ->distinct($dependent)
                ->whereNotnull($dependent)
                ->whereNull('gid_ati')
                ->orderBy($dependent, 'asc')
                ->get();
            $output = '<option value="">TOUS</option>';
            foreach ($data as $row) {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }
            echo $output;
        }else{
            $data   = DB::table('toponymes')
                    ->select($dependent)
                    ->distinct($dependent)
                    ->where('commune', $comValue)
                    ->where($select, $value)
                    ->whereNotnull($dependent)
                    ->whereNull('gid_ati')
                    ->orderBy($dependent, 'asc')
                    ->get();
            $output = '<option value=""></option>';
            foreach ($data as $row) {
                $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            }
            echo $output;
        }

    }

    function description()
    {
        //
    }

    function zoomCommune(Request $request)
    {
        $select    = $request->get('select');
        $valueCom  = $request->get('valueCom');
        $typeVoie  = $request->get('typeVoie');
        //$where     = "fclass ILIKE '%".$typeVoie."%' and ";
        //$where="id_enquete>0";
        //and fclass ILIKE '%".$typeVoie."%'
        $where =$select." ILIKE '%".$valueCom."%'";
        //if($fp2=fopen("C:/ms4w/test2.txt",'a+')){fputs($fp2,  $where.PHP_EOL);	fclose($fp2);}
        return $where;


    }
}
