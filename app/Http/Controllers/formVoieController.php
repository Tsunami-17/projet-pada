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
            $data      = DB::table('toponymes')
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
            $data      = DB::table('toponymes')
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

    function fetchtypo(Request $request)
    {
        $select    = $request->get('select');
        $value     = $request->get('value');
        $comValue  = $request->get('comValue');
        $dependent = $request->get('dependent');
        if ($value == 'TOUS')
        {
            $data      = DB::table('toponymes')
                    ->select($dependent)
                    ->distinct($dependent)
                    ->whereNotnull($dependent)
                    ->whereNull('gid_ati')
                    ->orderBy($dependent, 'asc')
                    ->get();
            $output = '<option value="">ff</option>';
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
}
