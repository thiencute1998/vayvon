<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\EditProductRequest;
use App\Repositories\Admin\LogoRepostiory;
use App\Repositories\Admin\PhotoEditingRepository;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    //
    private $repository;
    public function __construct(LogoRepostiory $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function create() {
        return view('admin.pages.logo.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'status', 'file');
        $this->repository->store($params);
        return redirect()->back()->with('add-success', 'Add success !!!');
    }

    public function edit($id) {
        $logo = $this->repository->edit($id);
        return view('admin.pages.logo.edit', compact('logo'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('name', 'status', 'file');
        $this->repository->update($params, $id);
        return redirect()->back()->with('edit-success', 'Edit success !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Delete success !!!');
    }
}
