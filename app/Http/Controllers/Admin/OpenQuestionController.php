<?php

namespace App\Http\Controllers\Admin;

use App\Models\OpenQuestion;
use App\Http\Requests\StoreOpenQuestionRequest;
use App\Http\Requests\UpdateOpenQuestionRequest;

class OpenQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreOpenQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOpenQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenQuestion  $openQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(OpenQuestion $openQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenQuestion  $openQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenQuestion $openQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOpenQuestionRequest  $request
     * @param  \App\Models\OpenQuestion  $openQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpenQuestionRequest $request, OpenQuestion $openQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenQuestion  $openQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenQuestion $openQuestion)
    {
        //
    }
}
