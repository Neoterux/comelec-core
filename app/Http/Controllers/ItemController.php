<?php

namespace App\Http\Controllers;

use App\Models\Item;

use DB;
use Illuminate\Http\Request;
use Log;
use Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'shortname' => 'required|string',
            'description' => 'required|string',
            'unit_price' => 'required|int',
            'unit' => 'required|int|min:0',
            'active' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], 422);
        }

        $data = $validator->validated();

        try {
            DB::beginTransaction();
            item::create([
                'name' => $data['name'],
                'shortname' => $data['shortname'],
                'description' => $data['description'],
                'unit_price' => $data['unit_price'],
                'unit' => $data['unit'],
                'active' => $data['active']
            ]);

        
            DB::commit();
            return response()->json([
                'message' => 'Item agregado correctamente'
            ], 201);
        } catch (\Throwable $t) {
            DB::rollBack();
            return response()->json([
                'message' => 'No se pudo guardar el item',
                (env('APP_ENV') == 'local' ? 'err' : '') => $t->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'shortname' => 'required|string',
            'description' => 'required|string',
            'unit_price' => 'required|int',
            'unit' => 'required|int|min:0',
            'active' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], 422);
        }
        
        $data = $validator->validated();
        
        try {
            DB::beginTransaction();

            $item = DB::table('items')
                ->where('item_id', $id)
                ->update([
                    'name' => $data['name'],
                    'shortname' => $data['shortname'],
                    'description' => $data['description'],
                    'unit_price' => $data['unit_price'],
                    'unit' => $data['unit'],
                    'active' => $data['active']
                ]);

            DB::commit();

            return response()->json([
                'err' => $item,
               
                'message' => 'Actualizado correctamente'
            ]);
        } catch(\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            return response()->json([
                'message' => 'Error al actualizar el item'
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            item::whereitemId($id)
                ->delete();        
            DB::commit();
            return response()->json([
                'message' => 'Item eliminado correctamente'
            ], 201);
        } catch (\Throwable $t) {
            DB::rollBack();
            return response()->json([
                'message' => 'No se pudo eliminar el item',
                (env('APP_ENV') == 'local' ? 'err' : '') => $t->getMessage()
            ], 400);
        }
    }
}
