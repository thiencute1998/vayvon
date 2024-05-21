<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\IndexRepository;
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
        return view('frontend.pages.index');
    }

    public function getPay() {
        return view('frontend.pages.pay');
    }

    public function postPay(Request $request) {
        $data = $this->repository->postPay($request->only('phone'));
        if ($data) {
            return redirect()->route('get-pay')->with(['data'=> $data]);
        }
        return redirect()->back()->withErrors(['msg' => 'Số điện thoại không tồn tại!']);
    }
}
