<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Description of AdministracionController
 *
 * @author JAKO
 */
class AdministracionController extends Controller{
    
    public function index(){
        return view('admin.index');
    }
    
}
