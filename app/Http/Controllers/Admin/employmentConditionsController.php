<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\employment_conditions;
use App\Models\employment_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use voku\helper\ASCII;

class employmentConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employment_items = employment_items::where('parent_id', '!=', 0)->paginate(20);
        return view('admin.employmentConditions.index', compact('employment_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employment_item_parents = employment_items::where('parent_id', '!=', 0)->get();
        return view('admin.employmentConditions.create', compact('employment_item_parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'conditions' => 'required',
            'employment_item_id' => 'required',
            'part_condition' => 'required',
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->conditions as $key => $item) {
                employment_conditions::create([
                    'title' => $request->conditions[$key],
                    'employment_item_id' => $request->employment_item_id,
                    'part_condition' => $request->part_condition,

                ]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i> در ثبت شرایط استخدام<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg', $massage);

        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"> شرایط استخدام مورد نظر با موفقیت ثبت شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->route('admin.employmentConditions.index')->with('msg', $massage);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($employment_item_id)
    {

        $conditions = employment_conditions::where('employment_item_id', '=', $employment_item_id)->get();
        $employment_item_id = employment_items::find($employment_item_id);
        return view('admin.employmentConditions.show', compact('conditions', 'employment_item_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($employment_item_id)
    {
        $employment_item = employment_items::find($employment_item_id);
        $employment_item_childs = employment_items::where('parent_id', '!=', 0)->get();
        $conditions = employment_conditions::where('employment_item_id', '=', $employment_item_id)->get();
        return view('admin.employmentConditions.edit', compact('conditions', 'employment_item_childs', 'employment_item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employment_item_id)
    {
        $request->validate([
            'id_conditions.*' => 'required',
            'conditions.*' => 'required',
            'part_condition.*' => 'required',
        ]);

        try {
            DB::beginTransaction();

            foreach ($request->id_conditions as $key => $id_condition) {
                $id_condition = employment_conditions::find($id_condition);
                $id_condition->update([
                    'title' => $request->conditions[$key],
                    'part_condition' => $request->part_condition[$key],
                    'employment_item_id' => $employment_item_id
                ]);
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $massage = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i> شرایط استخدام مورد نظر ثبت نشد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            return redirect()->back()->with('msg', $massage);

        }
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"> شرایط استخدام مورد نظر با موفقیت ثبت شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg', $massage);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($condition_id)
    {
        $condition = employment_conditions::find($condition_id);
        $condition->delete();

        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"> شرایط استخدام مورد نظر با موفقیت حذف شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }
}
