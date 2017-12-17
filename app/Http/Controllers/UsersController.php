<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\FrontController;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Laravolt\Avatar\Avatar;

class UsersController extends FrontController
{


    public function __construct()
    {
      parent::__construct();
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grid = [
                    'header' => [
                                 ['data' => 'name', 'title' => 'Nome'],
                                 ['data' => 'email', 'title' => 'Usuário'],
                                 ['data' => 'username', 'title' => 'Usuário'],
                                ]
                ];

        $data = ['grid' => $grid];


        return view('users.index')->with($data);


    }

    public function profile()
    {
      return view('users.profile')->with(['object' => \Auth::user()]);
    }

    public function search()
    {

       return DataTables::of(\App\User::all())
              ->setRowId('id')
              ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new \App\User;

        $this->validate($request, [ 
                            'username'    => 'required|unique:users,username',
                            'email'       => 'required|unique:users,email',
                            'password'    => 'required',
                            'name'        => 'required|unique:users,name'
                          ]);

        $user->username    =  $request->input('username');
        $user->email       =  $request->input('email');
        $user->password    =  bcrypt($request->input('password'));
        $user->name        =  $request->input('name');

        $user->save();
        $avatar = new Avatar();
        $avatar->create($user->name)->save(public_path('images/users/' . $user->id . '.png'));

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $object = \App\User::findOrfail($id);

        //$allRoles = \App\Role::all();

        /*$roles = \DB::select('SELECT roles.id 
                              FROM role_user
                              LEFT JOIN roles ON roles.ID = role_user.role_id
                              WHERE role_user.user_id = ?', [$id]);
        */

        //$rolesId = collect($roles)->pluck('id');

        $data = [
                  'object'   => $object,
                  'allRoles' => null,//$allRoles,
                  'roles'    => null,//$rolesId->all()
                ];

        return view('users.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::find($id);

        $user->name        = $request->input('name');
        $user->email       = $request->input('email');
        $user->username    = $request->input('username');
        $user->activated   = $request->input('activated');
        $user->validity    = $request->input('validity');

        $user->save();

        return redirect('/users/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try
        {
            $afectedRows = \App\User::destroy($id);        

            return response()->json(['afectedRows' => $afectedRows, 'error' => null]);
        }
        catch (\Illuminate\Database\QueryException $e)
        {

            return response()->json(['afectedRows' => null, 'error' => $e->getMessage()]);             
        }


    }

    public function updatePassword(Request $request)
    {
        if($request->input('password') === $request->input('confirm'))
        {
            $currentUser = \App\User::find(\Auth::user()->id);

            $currentUser->password = \Hash::make($request->input('password'));

            $saved = $currentUser->save();

            if($saved)
            {
                \Session::flash('flash_message','A atualizaÃ§Ã£o de senha foi realizada com sucesso');

                return redirect('/perfil');
            }
        }
        else
        {
            \Session::flash('flash_error','Seus dados de senha e confirmaÃ§Ã£o nÃ£o sÃ£o iguais');

            return redirect('/perfil');

        }    
    }

    public function updatePhoto(Request $request)
    {

        if($request->file('file'))
        {

            $file = $request->file('file');

            $extension = $file->guessExtension();

            try
            {

                $allPhotos = glob('public/images/users/' .  \Auth::user()->id . '.*');

                foreach($allPhotos as $p)
                {
                    unlink($p);
                }

                $saved = $file->move('public/images/users/', \Auth::user()->id . '.' . $extension);

                if($saved)
                {
                    \Session::flash('flash_message','imagem atualizada');

                    return redirect('/perfil');
                }
                else
                {
                    \Session::flash('flash_message','erro ao atualizar a imagem');

                    return redirect('/perfil');
                }
                
            }
            catch (Exception $e)
            {
                dd($e);    
            }    
        }
    }


    public function updateRole(Request $request)
    {
        \DB::table('role_user')->where('user_id', '=', $request->input('usuario'))->delete();

        $usuario = \App\User::find($request->input('usuario'));

        $count = 0;

        foreach ($request->input('role') as $key => $value)
        {
            $usuario->attachRole($value);

            $count++;
        }

        return response()->json(['afectedRows' => $count, 'erros' => 0]);
    }


    public function getUserName($id)
    {
      return response()->json(\App\Users::select(['username', 'name', 'email'])->find($id));      
    }


    public function updateAnotherPassword(Request $request)
    {

        if($request->input('password') === $request->input('confirm'))
        {
            $currentUser = \App\User::find($request->input('user'));

            $currentUser->password = \Hash::make($request->input('password'));

            $saved = $currentUser->save();

            if($saved)
            {
                \Session::flash('flash_message','A atualização de senha foi realizada com sucesso');

                return redirect('/usuario/' . $request->input('user'));
            }
        }
        else
        {
            \Session::flash('flash_error','Seus dados de senha e confirmação não são iguais');

            return redirect('/perfil');
        }   

    }

}