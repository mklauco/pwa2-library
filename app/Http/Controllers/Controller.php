<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Authors;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function defaultPassword(){
        return 'fchpt2021';
    }

    protected function authorList(){
        $authors = Authors::all();
        $list = [];
        foreach($authors as $a){
            $list[$a->id] = $a->first_name.' '.$a->last_name;
        }
        return $list;
    }

    protected function trueFalse(){
        $list[0] = 'false';
        $list[1] = 'true';
        return $list;
    }
}
