<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ConfigRepository;

class ConfigController extends Controller
{
    //
    private $repository;
    public function __construct(ConfigRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        $searchParams = $request->only('search');
        return $this->repository->index($searchParams);
    }

    public function update(Request $request) {
        $params = $request->only("email", "phone", "linked_in");
        $this->repository->update($params);
        return redirect()->back()->with('edit-success', 'Update config success !!!');
    }
}
