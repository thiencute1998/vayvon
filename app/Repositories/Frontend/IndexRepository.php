<?php

namespace App\Repositories\Frontend;

use App\Models\VayVon;
use App\Repositories\BaseRepository;

class IndexRepository extends BaseRepository {
    public function model()
    {
        // TODO: Implement model() method.
        return VayVon::class;
    }

    public function postPay($params) {
        if ($params['phone']) {
            return $this->model->where('phone', $params['phone'])->first();
        }
        return false;
    }
}
