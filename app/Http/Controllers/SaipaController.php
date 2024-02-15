<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\RequestResource;
use App\Models\Information;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SaipaController extends Controller
{
    public function sendRequest(Request $request)
    {
        $data = $request->validate([
            'information_id' => 'required|numeric',
        ]);

        $user = $request->user();
        $information = Information::where(['user_id' => $user->id, 'id' => $data['information_id'], 'visibility' => 1])->first();

        if ($information) {
            if ($information->type != 1){
                return new ErrorResource([
                    'status_code' => 400,
                    'error_code' => 322,
                    'message' => 'این اطلاعات متعلق به سایپا نمیباشد'
                ]);
            }
            $result = Http::asForm()->post('http://87.248.130.245:8000/getCarDetail', [
                'AdmsNo' => $information['reception_number'],
                'RqstNo' => $information['application_number'],
                'NationalID' => $information['national_code'],
                'CustCode' => $information['id_number'],
            ]);

            if ($result->successful()) {

                \App\Models\Request::create([
                    'user_id' => $user->id,
                    'user_ip' => $request->ip(),
                    'information_id' => $information->id,
                ]);

                $result_json = $result->json();

                if (isset($result_json['status']) and $result_json['status'] == 2) {
                    return new ErrorResource([
                        'status_code' => 400,
                        'error_code' => 100,
                        'message' => $result_json['message']
                    ]);

                } else {
                    return new RequestResource($result_json);
                }
            } else {
                return new ErrorResource([
                    'status_code' => 400,
                    'error_code' => 9009,
                    'message' => 'خطای ناشناخته ای رخ داد'
                ]);
            }
        }

        return new ErrorResource([
            'status_code' => 400,
            'error_code' => 9,
            'message' => 'اطلاعات مورد نظر یافت نشد'
        ]);
    }
}
