<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCastRequest;
use App\Models\CastCategory;
use App\Services\CastService;
use App\Services\ImageService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CastController extends Controller
{
    public function index()
    {
        $casts = CastCategory::orderBy('id', 'asc')
            ->paginate(10);

        return view('cast-list.index', compact('casts'));
    }

    public function create()
    {
        return view('cast-list.create');
    }

    public function store(StoreCastRequest $request)
    {

        dd($request->main_image_path);

        $attributes = CastService::castStore($request);

        CastCategory::create($attributes);

        session()->flash('status', '予約完了しました。');
        return to_route('owner.cast-list.index');
    }

    public function edit($id)
    {
        $cast = CastCategory::find($id);

        return view('cast-list.edit', compact('cast'));
    }

    public function update(StoreCastRequest $request, $id)
    {
        $cast = CastCategory::find($id);

        $attributes = CastService::castUpdate($cast, $request);

        $cast->update($attributes);

        session()->flash('status', '更新しました');

        return to_route('owner.cast-list.index');
    }

    public function destroy($id)
    {
        try {
            $cast = CastCategory::findorFail($id);
            $imagePath = ['main_image_path', 'sub_image_path'];

            foreach ($imagePath as $path) {
                if ($cast->imagePath) {
                    Storage::disk('public')->delete($cast->$path);
                }
            }
            $cast->delete();
            session()->flash('status', '削除しました');
            return to_route('owner.cast-list.index');
        } catch (QueryException $e) {
            return back()->withErrors('該当キャストに予約が入っているため削除できません。<br>予約を調整してください。');
        } catch (Exception $e) {
            return back()->withErrors('削除中にエラーが発生しました。');
        }
    }
}
