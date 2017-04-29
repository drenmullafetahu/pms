<?php

namespace Controllers;

use App\Http\Requests\AppRequest;
use Models\Permissions;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class PermissionsController extends MainController
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
    public function store(Request $request)
    {
        Permissions::create($request->all());

        Session::flash('permission_created', "Permissioni u Shtua me sukses");
        return redirect(http_employee('/permissions/create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Permissions::find($id)->update($request->all());

        Session::flash('permission_updated', "Permissioni u Rifreskua me sukses");
        return redirect(http_employee('/permissions/edit/' . $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        Permissions::findOrFail($id)->delete();

        Session::flash('permission_deleted', "Permissioni u Fshij me sukses");
        return redirect(http_employee("/permissions"));
    }
}
