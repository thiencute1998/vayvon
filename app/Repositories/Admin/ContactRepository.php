<?php

namespace App\Repositories\Admin;

use App\Models\Contact;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ContactRepository extends BaseRepository {

    public function model()
    {
        return Contact::class;
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
        $contacts = $query->paginate(10);
        return view('admin.pages.contact.index', compact('contacts'));
    }

    public function view($id)
    {
        $contact = $this->model->where('id', $id)->firstOrFail();
        return view('admin.pages.contact.view', compact('contact'));
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
