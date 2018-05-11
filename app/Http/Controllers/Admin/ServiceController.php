<?php
/**
 * Created by PhpStorm.
 * User: xin.li
 * Date: 3/26/2018
 * Time: 12:37 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Http\Requests\Admin\ServiceRequest;
use Illuminate\Http\Request;
use Datatables;
use Log;

class ServiceController extends Controller
{
    public function __construct()
    {
        view()->share('type', 'service');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Show the page
        $mode = 'create';
        $querystring = $request->getQueryString();
        if (isset($querystring)) {
            return view('admin.service.index', compact('mode','querystring'));
        } else {
            return view('admin.service.index', compact('mode'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $mode = 'create';
       if ($request->has('category')) {
           $category = Category::where('name', $request->input('category'))->first();
           return view('admin.service.create_edit', compact('service', 'category', 'mode'));
       }else{
           $categorys = Category::where('name','!=','test')->get();
           return view('admin.service.create_edit', compact('service', 'categorys', 'mode'));
       }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->link = $request->link;

        $categoryId = $request->category;
        $service->save();
        $service->category()->sync($categoryId);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        $mode = 'edit';
        if ($request->has('category')) {
            $category = Category::where('name', $request->input('category'))->first();
            return view('admin.service.create_edit', compact('service', 'category', 'mode'));
        }else{
            $categorys = Category::where('name','!=','owner')->get();
            return view('admin.service.create_edit', compact('service','categorys', 'mode'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {

        $categoryId = $request->categorys;
        if (!isset($categoryId)){
            $categoryId=[];
        }
        $service->update($request->except('name'));
        $service->name = $request->name;
        $service->description = $request->description;
        $service->link = $request->link;
        $service->category_id = intval($categoryId);
        $service->save();
//        $service->category()->sync($categoryId);
    }

    public function delete(Service $service)
    {
        return view('admin.service.delete', compact('service'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $services = Service::with('category');

        $datas = Datatables::of($services)
            ->addColumn('actions', '<a href="{{{ URL::to(\'admin/service/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                <a href="{{{ URL::to(\'admin/service/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>')
            ->make(true);
        return $datas;
    }

}