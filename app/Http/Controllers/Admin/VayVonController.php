<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\VayVonImport;
use App\Repositories\Admin\VayVonRepository;
use Illuminate\Http\Request;
use App\Repositories\Admin\ProductRepository;
use Maatwebsite\Excel\Excel;

class VayVonController extends Controller
{
    //
    private $repository;
    public function __construct(VayVonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        $vayvons = $this->repository->index($searchParams);
        return view('admin.pages.vayvon.index', compact('vayvons'));
    }

    public function create() {
        return view('admin.pages.vayvon.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'image', 'detail_name', 'detail_image', 'detail_link', 'title', 'keywords', 'description', 'order');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Added vayvon successfully !!!');
    }

    public function edit($id) {
        $vayvon = $this->repository->edit($id);
        return view('admin.pages.vayvon.edit', compact('vayvon'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('slug', 'name', 'image', 'detail_name', 'detail_image', 'detail_image_hidden', 'detail_link', 'title', 'keywords', 'description', 'order');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Updated vayvon successfully !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Deleted vayvon successfully !!!');
    }

    public function import(Request $request, Excel $excel) {
        $data = $excel->import(new VayVonImport(), $request->file('file'));
        return 2;
        $data->insertVayVon();
        return 1;
    }
}
