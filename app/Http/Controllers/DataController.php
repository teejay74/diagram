<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DataController extends Controller
{
    public function saveDataDiagram(Request $request) {
            $validator = Validator::make($request->all(), [
                'meaning' => 'required|numeric|between:0.01,999.99',
                'date' => 'date|unique:App\Models\Data,date',
            ]);

            if($validator->fails()) {
                return $validator->errors();
            }
            $data = new Data();
            $data->value = $request->meaning;
            $data->date = $request->date;
            $data->save();

    }

    public function editDataDiagram(Request $request) {
        $validator = Validator::make($request->all(), [
            'value' => 'required|numeric|between:0.01,999.99',
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }
        try {
            $dataItem = Data::all()->where('id', $request->id)->first();
            $dataItem->value = $request->value;
            $dataItem->save();

            return $request;
        } catch (ValidationException $e) {
            return $e;
        }

    }

    public function deleteDataDiagram(Request $request) {
       try {
           $dataItem = Data::all()->where('id', $request->id)->first();
           $dataItem->delete();

            return $request;
        } catch (ValidationException $e) {
            return $e;
        }

    }

    public function getDataDiagram() {
        try {
            $dataCollection = collect(Data::all());
            $sortedData = $dataCollection->sortBy('date');
            return $sortedData->values()->all();
        } catch (ValidationException $e) {
            return $e->getMessage();
        }
    }
}

