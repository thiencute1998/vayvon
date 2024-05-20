<?php

namespace App\Repositories\Admin;

use App\Models\Certificate;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CertificateRepository extends BaseRepository {
    private $pathImage = "upload/admin/Certificate/image";

    public function model()
    {
        return Certificate::class;
    }

    public function index() {
        $query = $this->model->query();
        $query->orderBy('updated_at', 'desc');
        $certificates = $query->where('status', 1)->paginate(10);
        return view('admin.pages.certificate.index', compact('certificates'));
    }

    public function store($params, $request) {
        $certificate = new $this->model;
        $params['status'] = 1;
        if($request->hasFile('image')) {
            $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
        }
        $certificate->fill($params);
        $certificate->save();
    }

    public function edit($id) {
        $query = $this->model->where('id', $id);
        return $query->firstOrFail();
    }

    public function update($params, $request, $id) {
        $slide = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $slide->fill($params);
            $slide->save();

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

    public function saveFile($file, $path) {
        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $fileNameStore = $filename.'_'.time().'.'.$extension;
        //Upload File
        $file->move(public_path($path), $fileNameStore);
        return $fileNameStore;
    }

}
