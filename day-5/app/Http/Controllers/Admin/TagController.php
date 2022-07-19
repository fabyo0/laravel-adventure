<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listTags = Tag::all();
        return view('admin.tag_list', compact('listTags'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $status = $request->status;

        $user = Auth::user();

        $data = [
            'name' => $name,
            'status' => $status ? 1 : 0,
            'user_id' => $user->id
        ];

        Tag::create($data);

        alert()->success('Başarılı', 'Etiket başarıyla eklendi...')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('tag.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $tags = Tag::find($id);

        return response()->json([
            'tag' => $tags
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $tags = Tag::find($id);

        //Tags name değerlerini request gelen değerlere eşitledik

        $tags->name = $request->name;
        $tags->status = $request->status ? 1 : 0;

        $tags->save();

        alert()->success('Başarılı', 'Etiket başarıyla güncellendi...')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id', $id)->delete();
    }

    public function changeStatus(Request $request)
    {
         try {
            $tagID = $request->id;
            $tag = Tag::find($tagID);
            $status = $tag->status;

            $tag->status = $status ? 0 : 1;

            $tag->save();

            return response()->json([
                'message' => 'Başarılı',
                'status' => $tag->status
            ], 200);


        } catch (\Exception $err) {
            return response()->json([
                'message' => 'Başarısız',
                'status' => $status
            ], 500);
        }
    }
}
