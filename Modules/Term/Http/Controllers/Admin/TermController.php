<?php

namespace Modules\Term\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Term\Entities\Term;
use Modules\Term\Http\Requests\TermRequest;
use Modules\Term\Transformers\TermCollection;

class TermController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Term::class);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $terms = Term::orderBy('created_at', 'desc')->get();
        return response()->json(new TermCollection($terms), 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TermRequest $request)
    {
//        $this->validateTerm($request);
        $term = new Term();
        $term->create($request->all());
        return response()->json([
            'message' => 'شرط با موفقیت ساخته شد.'
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TermRequest $request, Term $term)
    {
        $term->update($request->all());
        return response()->json([
            'message' => 'شرط با موفقیت آپدیت شد.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Term $term)
    {
        $term->delete();
        return response()->json([
            'message' => 'شرط با موفقیت حذف شد.'
        ], 200);

    }
}
