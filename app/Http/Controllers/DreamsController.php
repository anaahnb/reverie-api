<?php

namespace App\Http\Controllers;

use App\Http\Requests\DreamsRequest;
use Illuminate\Http\Request;
use App\Models\Dreams;

class DreamsController extends Controller {

    public function index(){
        $dreams = Dreams::all();
        return response()->json($dreams, 200);
    }

    public function store(DreamsRequest $request) {
        $validated = $request->validated();
        $validated['user_id'] = 1;

        $dream = Dreams::create($validated);

        return response()->json([
            'message' => __("message.success"),
            'data' => $dream
        ], 201);
    }

    public function show($id) {
        $dream = Dreams::find($id);

        if (!$dream) {
            return response()->json(['message' => __("message.not_found")], 404);
        }

        return response()->json($dream);
    }

    public function update(DreamsRequest $request, $id) {
        $dream = Dreams::find($id);

        if (!$dream) {
            return response()->json(['message' => __("message.not_found")], 404);
        }

        $validated = $request->validated();
        $dream->update($validated);

        return response()->json([
            'message' => __("message.success"),
            'data' => $dream
        ], 201);
    }

    public function destroy($id) {
        $dream = Dreams::find($id);

        if (!$dream) {
            return response()->json(['message' => __("message.not_found")], 404);
        }

        $dream->delete();

        return response()->json(['message' => __("message.success"), 200]);
    }

}
