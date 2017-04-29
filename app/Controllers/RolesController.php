<?php

namespace Controllers;

use App\Http\Requests\AppRequest;
use Models\Roles;
use Session;
use Illuminate\Routing\Route;

class RolesController extends MainController
{

    public function __construct(AppRequest $request, Route $route)
    {
        parent::__construct($request, $route);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppRequest $request)
    {
        $inputs = $request->all();

        $roles = Roles::create($inputs);


        $synData = '';
        foreach ($inputs['actions'] as $key => $value) {
            $syncData[$key]['p_create'] = (isset($value['p_create'])) ? $value['p_create'] : 0;
            $syncData[$key]['p_read'] = (isset($value['p_read'])) ? $value['p_read'] : 0;
            $syncData[$key]['p_update'] = (isset($value['p_update'])) ? $value['p_update'] : 0;
            $syncData[$key]['p_delete'] = (isset($value['p_delete'])) ? $value['p_delete'] : 0;
        }
        $roles->permissions()->sync($syncData);

        Session::flash('role_created', "Roli i Userit u Shtua me sukses");
        return redirect(http_employee('/roles/create'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppRequest $request, $id)
    {

        $inputs = $request->all();

        $roles = Roles::find($id);
        $roles->update($request->all());
        $synData = '';
        foreach ($inputs['actions'] as $key => $value) {
            $syncData[$key]['p_create'] = (isset($value['p_create'])) ? $value['p_create'] : 0;
            $syncData[$key]['p_read'] = (isset($value['p_read'])) ? $value['p_read'] : 0;
            $syncData[$key]['p_update'] = (isset($value['p_update'])) ? $value['p_update'] : 0;
            $syncData[$key]['p_delete'] = (isset($value['p_delete'])) ? $value['p_delete'] : 0;
        }
        $roles->permissions()->sync($syncData);

        Session::flash('role_updated', "Roli i Userit u Rifreskua me sukses");
        return redirect(http_employee('/roles/edit/' . $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Roles::findOrFail($id)->delete();

        Session::flash('role_deleted', "Roli i Userit u Fshij me sukses");
        return redirect(http_employee('/roles'));
    }
}
