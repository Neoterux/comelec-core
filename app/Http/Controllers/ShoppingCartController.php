<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use DB;
use Illuminate\Http\Request;
use Log;
use Validator;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return ShoppingCart::whereUserId(auth()->id())
            ->with('content')
            ->first();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            '*.item_id' => 'integer|required',
            '*.quantity' => 'integer|required|min:0',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], 422);
        }
        $data = collect($validator->validated());
        $cart = ShoppingCart::whereUserId(auth()->id())->first();
        try {
            DB::beginTransaction();

            $items_id = $data->filter(
                fn($it) => intval($it['quantity']) > 0
            )->map(fn ($it) => $it['item_id']);
            $items = $data->keyBy('item_id');
            $cart->content()
                ->whereNotIn('item_id', $items_id)
                ->delete();

            $items_id->each(function ($id) use ($cart, $items) {
                $target = $items[$id];
                $cart->content()->firstOrCreate([
                    'item_id' => $id
                ], [
                    'quantity' => $target['quantity']
                ]);
            });

            DB::commit();
            return response()->json([
                'err' => $items,
                'message' => 'Actualizado correctamente'
            ]);
        } catch(\Throwable $th) {
            Log::error($th);
            DB::rollBack();
            return response()->json([
                'message' => 'Error al actualizar Carrito'
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
