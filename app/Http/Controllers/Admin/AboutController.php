<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AboutRepository;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    private $repository;
    public function __construct(AboutRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        return $this->repository->index();
    }

    public function update(Request $request) {
        $params = $request->all();
        $this->repository->update($params);
        return redirect()->back()->with('edit-success', 'Update about success !!!');
    }
}
