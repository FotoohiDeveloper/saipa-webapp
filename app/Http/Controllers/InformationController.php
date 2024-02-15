<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\InformationCollection;
use App\Http\Resources\SuccessResource;
use Illuminate\Support\Facades\Http;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();
        $informations = Information::where(['user_id' => $user->id, 'visibility' => 1])->get();
        return new InformationCollection($informations);
    }

    public function addSaipa(Request $request)
    {
        $id = $request->user()->id;
        $data = $request->validate([
            'reception_number' => 'required|numeric',
            'application_number' => 'required|numeric',
            'national_code' => 'required|numeric',
            'id_number' => 'required|numeric'
        ]);

        $status = $this->confirmationSaipa($data);

        if (!$status['status']) {
            return new ErrorResource([
                'status_code' => 400,
                'message' => 'خودروی شما در سایپا وجود ندارد',
                'error_code' => '5005'
            ]);
        }

        $information = Information::create([
            'user_id' => $id,
            'type' => 1,
            'reception_number' => $data['reception_number'],
            'application_number' => $data['application_number'],
            'national_code' => $data['national_code'],
            'id_number' => $data['id_number'],
            'car_name' => $status['car_name'],
            'owner_fullname' => $status['owner_fullname']
        ]);

        if ($information) {
            return new SuccessResource([
                'status_code' => 200,
                'message' => 'اطلاعات با موفقیت افزوده شد',
                'success_code' => '100'
            ]);
        }

        return new ErrorResource([
            'status_code' => 200,
            'message' => 'خطای ناشناخته ای رخ داد',
            'error_code' => '005'
        ]);
    }

    public function delete(Request $request)
    {
        $data = $request->validate([
            'information_id' => 'numeric|required',
        ]);

        $id = $request->user()->id;
        $information = Information::where(['user_id' => $id, 'id' => $data['information_id']])->first();

        if ($information and $information->visibility != 0) {
            $information->visibility = 0;
            $information->save();
            return new SuccessResource([
                'status_code' => 200,
                'success_code' => 2,
                'message' => 'اطلاعات شما با موفقیت حذف شد'
            ]);
        }

        return new ErrorResource([
            'status_code' => 400,
            'error_code' => 6,
            'message' => 'اطلاعات شما یافت نشد'
        ]);
    }

    // public function update(Request $request)
    // {
    //     $data = $request->validate([
    //         'information_id' => 'required|numeric',
    //         'reception_number' => 'required|numeric',
    //         'application_number' => 'required|numeric',
    //         'national_code' => 'required|numeric',
    //         'id_number' => 'required|numeric',
    //     ]);

    //     $id = $request->user()->id;
    //     $information = Information::where(['user_id' => $id, 'id' => $data['information_id']])->first();

    //     if ($information && $information->visibility != 0) {
    //         unset($data['information_id']);
    //         $information->update($data);
    //         $information->save();
    //         return new SuccessResource([
    //             'status_code' => 200,
    //             'success_code' => 3,
    //             'message' => 'اطلاعات شما با موفقیت بروزرسانی شد'
    //         ]);
    //     }

    //     return new ErrorResource([
    //         'status_code' => 400,
    //         'error_code' => 7,
    //         'message' => 'خطای ناشناخته ای رخ داد'
    //     ]);
    // }

    public function confirmationSaipa($request) {
        $result = Http::asForm()->post('http://87.248.130.245:8000/getCarDetail', [
            'AdmsNo' => $request['reception_number'],
            'RqstNo' => $request['application_number'],
            'NationalID' => $request['national_code'],
            'CustCode' => $request['id_number'],
        ]);

        if ($result->successful() and $result->json()['status'] != 2) {
            $result = $result->json();
            return [
                'status' => true,
                'car_name' => $result['car_name'],
                'owner_fullname' => $result['first_name'] . ' ' . $result['last_name']
            ];
        }

        return [
            'status' => false,
        ];
    }
}
