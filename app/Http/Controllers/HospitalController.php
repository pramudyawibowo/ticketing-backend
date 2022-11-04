<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $hospital = Hospital::get();
            return DataTables::of($hospital)
            ->addIndexColumn()
            ->addColumn('time', function ($item) {
                return $item->open_time . ' - ' . $item->close_time;
            })
            ->editColumn('photo', function ($item) {
                return '<img src="'. $item->logo .'" class="img-fluid">';
            })
            ->addColumn('status', function ($item) {
                if ($item->active) {
                    return '<div class="form-check form-switch form-check-custom form-check-solid ps-3">
                        <input class="form-check-input status-table" onchange="changeStatus(this)" type="checkbox" id="active" value="1" data-slug="' . $item->slug . '" checked />
                        <span class="fw-bold ps-2 fs-6" id="status" data-slug="' . $item->slug . '">Aktif</span>
                    </div>';
                } else {
                    return '<div class="form-check form-switch form-check-custom form-check-solid ps-3">
                        <input class="form-check-input status-table" onchange="changeStatus(this)" type="checkbox" id="active" value="0" data-slug="' . $item->slug . '"/>
                        <span class="fw-bold ps-2 fs-6" id="status" data-slug="' . $item->slug . '">Nonaktif</span>
                    </div>';
                }
            })
            ->addColumn('actions', function ($item) {
                return '<div class="dropdown">
                <button type="button" class="btn btn-secondary btn-sm btn-active-light-primary rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-bs-toggle="dropdown">
                    Pilihan
                    <span class="svg-icon svg-icon-3 rotate-180 ms-3 me-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                        </svg>
                    </span>
                </button>
                <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-100px py-4" data-kt-menu="true">
                    <div class="menu-item px-3">
                        <a id="delete-confirm" class="menu-link px-3 delete-confirm" data-slug="' . $item->slug . '" role="button">Hapus</a>
                    </div>
                </div>
            </div>';
            })
            ->rawColumns(['status', 'photo', 'actions'])
            ->make();
        }

        return view('hospital.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
