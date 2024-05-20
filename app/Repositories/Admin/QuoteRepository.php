<?php

namespace App\Repositories\Admin;

use App\Models\Quote;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class QuoteRepository extends BaseRepository {

    public function model()
    {
        return Quote::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $name = $searchParams['name'];
            $query->where('name', 'like', "$name%");
        }

        if (isset($searchParams['created_at'])) {
            $created_at = date("Y-m-d", strtotime($searchParams['created_at']));
            $query->WhereRaw('str_to_date(created_at,"%Y-%m-%d") = "'.$created_at.'"');
        }
        $query->orderBy('created_at', 'desc');
        $quotes = $query->paginate(10);
        return view('admin.pages.quote.index', compact('quotes'));
    }

    public function view($id)
    {
        $quote = $this->model->where('id', $id)->with('products')->firstOrFail();
        return view('admin.pages.quote.view', compact('quote'));
    }

    public function delete($id) {
        DB::beginTransaction();
        try {
            $this->model->where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

}
