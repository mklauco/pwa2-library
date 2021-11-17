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

    protected function listAuthors(){
        $authors = Authors::orderby('last_name', 'asc')->get();
        $listAuthors = [];
        foreach($authors as $a){
          $listAuthors[$a->id] = $a->first_name.' '.$a->last_name;
        }
        return $listAuthors;
    }

}
