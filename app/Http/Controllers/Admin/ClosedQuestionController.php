<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClosedQuestion;
use App\Http\Requests\StoreClosedQuestionRequest;
use App\Http\Requests\UpdateClosedQuestionRequest;

class ClosedQuestionController extends Controller
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
     * @param  \App\Http\Requests\StoreClosedQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClosedQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClosedQuestion  $closedQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ClosedQuestion $closedQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClosedQuestion  $closedQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ClosedQuestion $closedQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClosedQuestionRequest  $request
     * @param  \App\Models\ClosedQuestion  $closedQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClosedQuestionRequest $request, ClosedQuestion $closedQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClosedQuestion  $closedQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClosedQuestion $closedQuestion)
    {
        //
    }
}
