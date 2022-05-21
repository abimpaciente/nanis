<?php

namespace App\Http\Controllers;

use App\Exports\UsuarioExport;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExportView()
    {
       return view('import');
    }

    public function exportExcelUsuarios()
    {
        $sheet = new UsuarioExport();
        return Excel::download($sheet, 'users.xlsx');
    }

    public function importListVerb(Request $request)
    {
        $theArray = Excel::toArray([], storage_path('List_Verbs.xls'));
        $init = 0;
        $currently_page = 1;
        $loading_content = "10";
        //$tipo = "";
        if(count($request->all())){
            if($request->page){
                $init = ($request->page - 1) * 10;
                $currently_page = $request->page;
            }
            if($request->loading_content){
                $loading_content = $request->loading_content;
            }
            if($request->tipo!='' && $request->inicial!=''){
                $tipo = $request->tipo;
                $inicial = $request->inicial;
                $theArray[0] = Arr::where($theArray[0], function ($value, $key) use($tipo) {
                    return $value['0'] == $tipo;
                });
                $theArray[0] = $this->myFilter($theArray[0]);
                $theArray[0] = $this->myFilterByLetter($theArray[0], ucfirst($inicial));
            }else if($request->tipo!='' && $request->inicial==''){
                $tipo = $request->tipo;
                $theArray[0] = Arr::where($theArray[0], function ($value, $key) use($tipo) {
                    return $value['0'] == $tipo;
                });
                $theArray[0] = $this->myFilter($theArray[0]);
            }else if($request->tipo=='' && $request->inicial!=''){
                $inicial = $request->inicial;
                $theArray[0] = $this->myFilterByLetter($theArray[0], ucfirst($inicial));
            }
        }

        $data = array();
        $pages = ceil(count($theArray[0]) / 10);
        $data['pages']['total'] = $pages;
        $data['pages']['currently_page'] = $currently_page;
        $data['pages']['total_mostrar'] = $loading_content;
        $limit = 0;
        $temp = 0;
        for($i = $init; $i < count($theArray[0]); $i++){
            $limit ++;
            if ($limit<=$loading_content){
                $data['data'][$temp]['type'] = $theArray[0][$i][0];
                $data['data'][$temp]['simple_form'] = $theArray[0][$i][1];
                $data['data'][$temp]['third_person'] = $theArray[0][$i][2];
                $data['data'][$temp]['simple_past'] = $theArray[0][$i][3];
                $data['data'][$temp]['past_participle'] = $theArray[0][$i][4];
                $data['data'][$temp]['gerund'] = $theArray[0][$i][5];
                $data['data'][$temp]['meaning'] = $theArray[0][$i][6];
                $temp++;
            }else{
                break;
            }
        }

        //$theArray = $this->myFilter($theArray[0]);
        /* $theCollection = Excel::toCollection(collect([]), storage_path('List_Verbs.xls')); */
        return  $data;
    }
    public function myFilterByLetter($callback, $letter)
    {
        $return = [];
        foreach($callback as $value){
            $exits = false;
            if($value[1][0]==$letter){
                $exits = true;
            }
            if($exits){
                $return[] = $value;
            }

        }
        return $this->myFilter($return);
    }
    public function myFilter($callback)
    {
        $return = [];
        foreach($callback as $value){
            $return[] = $value;
        }
        return $return;
    }
}
