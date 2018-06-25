<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Modality;
use App\Location;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->primeiro_login == 0) {
                return view('first', ['usuario' => $user]);
            } else {
                return view('home', ['usuario' => $user]);
            }
        } else {
            return view('auth.login');
        }
    }

    public function begin(Request $request)
    {
        $category = new Category;
        $category->nome = $request->categoria;
        $modality = new Modality;
        $modality->nome = $request->modalidade;
        $location = new Location;
        $location->nome = $request->localidade;
        if ($category->save() && $modality->save() && $location->save()) {
            $notification = array(
                'message' => 'Todos os dados foram criados com sucesso!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Ocorreu um erro ao tentar cadastrar os dados!',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('home.success')->with($notification);
    }

    public function success()
    {
        $user = Auth::user();
        $user->update(['primeiro_login' => 1]);
        return view('success');
    }
}
