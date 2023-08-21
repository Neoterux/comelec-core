<?php

namespace App\Http\Controllers;

use App\Models\CreditCard;
use App\Models\User;

use DB;
use Illuminate\Http\Request;
use Log;
use Validator;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CreditCard::whereUserId(auth()->id())
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required|string',
            'nickname' => 'required|string',
            'expiration_date' => 'required|string',
            'ccv' => 'required|string',
            'active' => 'required|int',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], 422);
        }
        $data = $validator->validated();
        $user = User::whereId(auth()->id())->first();

        try {
            DB::beginTransaction();
            CreditCard::create([
                'user_id' => $user->getKey(),
                'number' => $data['number'],
                'nickname' => $data['nickname'],
                'expiration_date' => $data['expiration_date'],
                'ccv' => $data['ccv'],
                'active' => $data['active']
            ]);

        
            DB::commit();
            return response()->json([
                'message' => 'Tarjeta agregada correctamente'
            ], 201);
        } catch (\Throwable $t) {
            DB::rollBack();
            return response()->json([
                'message' => 'No se pudo guardar la tarjeta',
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
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            CreditCard::whereCardId($id)
                ->delete();        
            DB::commit();
            return response()->json([
                'message' => 'Tarjeta eliminada correctamente'
            ], 201);
        } catch (\Throwable $t) {
            DB::rollBack();
            return response()->json([
                'message' => 'No se pudo eliminar la tarjeta',
                (env('APP_ENV') == 'local' ? 'err' : '') => $t->getMessage()
            ], 400);
        }
    }
}
