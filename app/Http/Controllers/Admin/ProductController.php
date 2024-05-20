<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Admin\ProductRepository;

class ProductController extends Controller
{
    //
    private $repository;
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) {
        //$searchParams = $request->only('search');
        $searchParams = $request->all();
        $products = $this->repository->index($searchParams);
        return view('admin.pages.product.index', compact('products'));
    }

    public function create() {
        return view('admin.pages.product.create');
    }

    public function store(Request $request) {
        $params = $request->only('name', 'image', 'detail_name', 'detail_image', 'detail_link', 'title', 'keywords', 'description', 'order');
        $this->repository->store($params, $request);
        return redirect()->back()->with('add-success', 'Added product successfully !!!');
    }

    public function edit($id) {
        $product = $this->repository->edit($id);
        return view('admin.pages.product.edit', compact('product'));
    }

    public function update(Request $request, $id) {
        $params = $request->only('slug', 'name', 'image', 'detail_name', 'detail_image', 'detail_image_hidden', 'detail_link', 'title', 'keywords', 'description', 'order');
        $this->repository->update($params, $request, $id);
        return redirect()->back()->with('edit-success', 'Updated product successfully !!!');
    }

    public function delete($id) {
        $this->repository->delete($id);
        return redirect()->back()->with('delete-success', 'Deleted product successfully !!!');
    }
}
