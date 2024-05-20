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

    private $type = 2;
    private $pathImage = "upload/admin/Product/image";
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
            $product = new $this->model;
            $params['type'] = $this->type;
            $params['slug'] = Str::slug($params['name'], '-');
            $slugs = $this->model->where('slug', ''.$params['slug'].'')->first();
            if($slugs){
                $params['slug'] = $params['slug'].'-1';
            }
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $product->fill($params);

            $product->save();
            if (isset($params['detail_name'])) {
                $arr = [];
                foreach ($params['detail_name'] as $key=> $item) {
                    $image = "";
                    if (isset($params['detail_image'][$key])) {
                        $image = $this->saveFile($params['detail_image'][$key], $this->pathImage);
                    }

                    $arr[] = [
                        'product_id'=> $product->id,
                        'name'=> $item,
                        'image'=>$image,
                        'link'=> isset($params['detail_link'][$key]) ?$params['detail_link'][$key] : null
                    ];
                }
                ProductDetail::insert($arr);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit($id) {
        $query = $this->model->where('id', $id)->with('productDetails');
        return $query->firstOrFail();
    }

    public function update($params, $request, $id) {
        $product = $this->model->findOrFail($id);
        DB::beginTransaction();
        try {
            $params['slug'] = Str::slug($params['name'], '-');
            if($request->hasFile('image')) {
                $params['image'] = $this->saveFile($request->file('image'), $this->pathImage);
            }
            $product->fill($params);
            $product->save();

            if (isset($params['detail_name'])) {
                ProductDetail::where('product_id', $id)->delete();
                $arr = [];
                foreach ($params['detail_name'] as $key=> $item) {
                    $image = "";
                    if (isset($params['detail_image_hidden'][$key])) {
                        $image = $params['detail_image_hidden'][$key];
                    }
                    if (isset($params['detail_image'][$key])) {
                        $image = $this->saveFile($params['detail_image'][$key], $this->pathImage);
                    }
                    $arr[] = [
                        'product_id'=> $id,
                        'name'=> $item,
                        'image'=>$image,
                        'link'=> isset($params['detail_link'][$key]) ?$params['detail_link'][$key] : null
                    ];
                }
                ProductDetail::insert($arr);
            }

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
            ProductDetail::where('product_id', $id)->delete();
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

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
