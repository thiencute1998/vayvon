<?php

namespace App\Repositories\Admin;

use App\Models\About;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Log;

class AboutRepository extends BaseRepository {
    public function model()
    {
        return About::class;
    }

    public function index() {
        $query = $this->model->query();
        $about = $query->where('id', 1)->first();
        return view('admin.pages.about.about', compact('about'));
    }

    public function update($params) {
        $about = $this->model->where('id', 1)->firstOrFail();
        $about->fill($params);
        $about->save();
    }

}
