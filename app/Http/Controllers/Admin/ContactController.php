<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    private $repository;
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        return $this->repository->index($searchParams);
    }

    public function view($id) {
        return $this->repository->view($id);
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Deleted contact successfully !!!');
    }
}
