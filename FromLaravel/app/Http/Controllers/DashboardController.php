<?php

namespace App\Http\Controllers;

use App\Forms;
use App\User;
use App\FormSubmissions;
use App\Submissions;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Forms::paginate(1);
        return view('dashboard.index', compact('forms'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = Forms::find($id);

        return view('dashboard.field', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forms = Forms::find($id);
        return view('dashboard.update', compact('forms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {

            $users = User::all()->where('display_name', $data['user_id']);

            foreach ($users as $user) {

                $data['user_id'] = $user->id;
            }

            $forms = Forms::find($id)->update($data);

            return redirect('dashboard/' . $forms->id . '/edit')->with('messenge', 'Update form successfully !!');

        } catch (\Exception $e) {
            return back()->withInput()->withMessage($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sreach(Request $request)
    {
        $data = $request->all();

        $users = User::where('display_name', 'like','%'. $data['sreach'] .'%')->get();

        if (!empty($users)) {

            foreach ($users as $user) {
                $user_id = $user->id;
            }

            if(!empty($user_id))
            {
                $forms = Forms::where('user_id', $user_id)->paginate(1);

                return view('dashboard.index', compact('forms'));

            }
        }
    }
}
