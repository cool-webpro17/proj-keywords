<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeywordPost;
use App\Keyword;
use Illuminate\Http\Request;

class ProjectKeywordsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeywordPost $request)
    {
        $keywordsName = $request->keywords_name;
        $keywords = explode(',', $keywordsName);
        $projectId = $request->project_id;
        foreach ($keywords as $keyword) {
            $trimKeyword = ltrim($keyword);
            // check exist
            $findKeyword = Keyword::where('keyword_name', $trimKeyword)->first();
            if (empty($findKeyword)) {
                $keyword = Keyword::create([
                    'project_id'        => $projectId,
                    'keyword_name'      => $trimKeyword
                ]);
            }
        }
        // redirect
        return redirect()->route('projects.show', ['id' => $projectId])->with('message', [
            'status'    => 'success',
            'content'   => 'Created the keywords successfully!'
        ]);
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
