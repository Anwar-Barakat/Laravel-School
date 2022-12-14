<?php

namespace App\Repositories\Repository;

use App\Models\Fee;
use App\Models\Grade;
use App\Repositories\Interface\FeeRepositoryInterface;

class  FeeRepository implements FeeRepositoryInterface
{
    public function index()
    {
        $fees       = Fee::latest()->get();
        return view('pages.fees.index', ['fees' => $fees]);
    }

    public function create()
    {
        $grades     = Grade::all();
        return view('pages.fees.create', ['grades' => $grades]);
    }

    public function store($request)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['amount', 'type', 'grade_id', 'classroom_id', 'description', 'year']);
            $exists = Fee::where(['grade_id' => $data['grade_id'], 'classroom_id' => $data['classroom_id'], 'type' => $data['type']])->count();

            if ($exists > 0)
                toastr()->error(__('msgs.is_existed', ['name' => __('fee.fees')]));
            else {
                Fee::create($data);
                toastr()->success(__('msgs.added', ['name' => __('fee.fees')]));
            }
            return redirect()->route('fees.index');
        }
    }


    public function edit($fee)
    {
        $grades = Grade::all();
        return view('pages.fees.edit', ['grades' => $grades, 'fee' => $fee]);
    }

    public function update($request, $fee)
    {
        try {
            $data       = $request->only(['amount', 'type', 'grade_id', 'classroom_id', 'description', 'year']);
            $exists     = Fee::where(['grade_id' => $data['grade_id'], 'classroom_id' => $data['classroom_id'], 'type' => $data['type']])->count();

            if ($exists > 0)
                toastr()->error(__('msgs.is_existed', ['name' => __('fee.fees')]));
            else {
                $fee->update($data);
                toastr()->success(__('msgs.updated', ['name' => __('fee.fees')]));
            }

            return redirect()->route('fees.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function destroy($fee)
    {
        try {
            $fee->delete();
            toastr()->info(__('msgs.deleted', ['name' => __('fee.fees')]));
            return redirect()->route('fees.index');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}