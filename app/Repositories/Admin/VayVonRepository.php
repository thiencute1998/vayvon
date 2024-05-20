<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\VayVon;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class VayVonRepository extends BaseRepository {

    public function model()
    {
        return VayVon::class;
    }

    public function index($searchParams) {
        $query = $this->model->query();
        if (isset($searchParams['name'])) {
            $name = $searchParams['name'];
            $query->where('name', 'like', "$name%");
        }
        if (isset($searchParams['status'])) {
            $status = $searchParams['status'];
            $query->where('status', '=', "$status");
        }
        if (isset($searchParams['created_at'])) {
            $created_at = date("Y-m-d", strtotime($searchParams['created_at']));
            $query->WhereRaw('str_to_date(created_at,"%Y-%m-%d") = "'.$created_at.'"');
        }
        $query->orderBy('updated_at', 'desc');
        return $query->paginate(10);
    }

    /**
     * @throws \Exception
     */
    public function store($params, $request) {
        DB::beginTransaction();
        try {
            $model = new $this->model;
            if (isset($params['is_pay'])){
                $params['is_pay'] = $params['is_pay'] ? 1 : 0;
            } else {
                $params['is_pay'] = 0;
            }
            if (isset($params['status'])){
                $params['status'] = $params['status'] ? 1 : 0;
            } else {
                $params['status'] = 0;
            }
            $model->fill($params);
            $model->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id);
        return $query->firstOrFail();
    }

    public function update($params, $id) {
        DB::beginTransaction();
        try {
            $model = $this->model->findOrFail($id);
            if (isset($params['is_pay'])){
                $params['is_pay'] = $params['is_pay'] ? 1 : 0;
            } else {
                $params['is_pay'] = 0;
            }
            if (isset($params['status'])){
                $params['status'] = $params['status'] ? 1 : 0;
            } else {
                $params['status'] = 0;
            }
            $model->fill($params);
            $model->save();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
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

    public function deleteAll($ids) {
        $this->model->whereIn('id', $ids['ids'])->delete();
    }

}
