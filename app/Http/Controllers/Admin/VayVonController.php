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
        $params = $request->all();
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Thêm vay vốn thành công !!!');
    }

    public function edit($id) {
        $vayvon = $this->repository->edit($id);
        return view('admin.pages.vayvon.edit', compact('vayvon'));
    }

    public function update(Request $request, $id) {
        $params = $request->all();
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Cập nhật vay vốn thành công !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Xóa item thành công !!!');
    }

    public function deleteAll(Request $request) {
        $this->repository->deleteAll($request->only('ids'));
        return response()->json(['message' => 'Xóa các item thành công']);
    }

    public function import(Request $request, Excel $excel) {
        $data = $excel->import(new VayVonImport(), $request->file('file'));
        return redirect()->back()->with('import-success', 'Import thành công !!!');
    }

    public function isPay(Request $request){
        $this->repository->isPay($request->only('id', 'is_pay'));
        return response()->json(['code' => 200]);
    }

    public function isStatus(Request $request){
        $this->repository->isStatus($request->only('id', 'is_status'));
        return response()->json(['code' => 200]);
    }
}
