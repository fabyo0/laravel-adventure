<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Diff\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // gerekli olan field alanlarını almak
        //$getSingle = PostCategory::select('name','description')->get();

        $listCategory = PostCategory::all();

        // Model üzerinden direk join işlemi

        /* $listCategory = PostCategory::join('users','users.id','=','post_category.user_id')
        ->select('post_category.*','users.name as userName')
        ->get();*/

        //Query builder ile join işlemi
        //TODO:  tek fark model üzerindeki değerle gelmeyecektir

        /*   $listCategory = DB::table('post_category')
               ->join('users' ,'users.id','=','post_category.user_id')
               ->select('post_category.*','users.name as userName')
               ->get();*/

        return view('admin.category_list', compact('listCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert category

        $name = $request->name;
        $description = $request->description;
        $status = $request->status;

        $user = Auth::user();

        $data = [
            'name' => $name,
            'description' => $description,
            'status' => $status ? 1 : 0,
            'user_id' => $user->id
        ];

        PostCategory::create($data);

        alert()->success('Başarılı', 'Kategori başarıyla eklendi...')
            ->showConfirmButton('Tamam', '#3085d6');

        return redirect()->route('category.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        try {
            $categoryID = $request->id;
            $category = PostCategory::find($categoryID);

            $status = $category->status;

            // kategori status değiştirme
            $category->status = $status ? 0 : 1;

            $category->save();

            // kaydettikden sonra cevabı json olarak gönderdik

            return response()->json([
                'message' => 'Başarılı',
                'status' => $category->status
            ], 200);

        } // hata durumunda
        catch (\Exception $err) {
            return response()->json([
                'message' => 'Başarısız',
                'status' => $status
            ], 500);
        }
    }

    public function deleteCategory(Request $request)
    {
        $categoryID = $request->id;

        PostCategory::where('id', $categoryID)->delete();

        return response()->json([
            'message' => 'Başarılı',
        ], 200);
    }
}
