<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Viewer\IndexRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    private $repository;
    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index() {
        return $this->repository->index();
    }

    public function quote() {
        return $this->repository->quote();
    }

    public function requestQuote(Request $request) {
        $params = $request->only('name', 'email', 'phone', 'position', 'business','interest_in', 'products', 'message');

        return $this->repository->requestQuote($params);
    }

    public function about() {
        return $this->repository->about();
    }

    public function contact() {
        return $this->repository->contact();
    }

    public function sendContact(Request $request) {
        $params = $request->only('name', 'email', 'subject', 'message');
        return $this->repository->sendContact($params);
    }

    public function slug($slug) {
        $product = $this->repository->slug($slug);
        return view('viewer.pages.products', compact('product'));
    }
}
