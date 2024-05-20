<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\ApplicationRepository;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    private $type = 1; // application
    private $repository;
    public function __construct(ApplicationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        $applications = $this->repository->index($searchParams, $this->type);
        return view('admin.pages.application.index', compact('applications'));
    }

    public function create() {
        return view('admin.pages.application.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'image', 'content', 'title', 'keywords', 'description', 'order');
        $params['type'] = $this->type;
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Added application successfully !!!');
    }

    public function edit($id) {
        $application = $this->repository->edit($id);
        return view('admin.pages.application.edit', compact('application'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('slug','name', 'image', 'content', 'title', 'keywords', 'description', 'order');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Updated application successfully !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Deleted application successfully !!!');
    }
}
