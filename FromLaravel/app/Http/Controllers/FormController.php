<?php

namespace App\Http\Controllers;

use App\Forms;
use App\FormSubmissions;
use App\Submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Forms::all()->where('user_id', Auth::user()->id);
        return view('forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_filter($request->all());

        $validator = [
            'title' => 'required',
        ];

        $this->validate($request, $validator);

        try {

            $data['user_id'] = Auth::user()->id;

            $form = Forms::create($data);

            return redirect('my/myforms/create')
                ->with(['messenge' => 'Form was created successfully!', 'link' => 'http://fromlaravel.dev:82/' . $form->id]);

        } catch (\Exception $e) {

            return back()->withInput()->withMessage($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Forms $forms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function getRequestForm(Request $request, $id)
    {

        $data = array_filter($request->all());

        try {

            $data_submission['form_id'] = $id;

            $submission = Submissions::create($data_submission);

            foreach ($data as $key => $value) {

                $data['form_id'] = $id;

                $data['submission_id'] = $submission->id;

                $data['field_name'] = $key;

                $data['field_value'] = $value;

                FormSubmissions::create($data);
            }

            return "OK";
        } catch (\Exception $e) {
            return back()->withInput()->withMessage($e->getMessage());
        }
    }
}
