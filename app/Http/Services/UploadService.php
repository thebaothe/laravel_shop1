<?php

namespace App\Http\Services;

class UploadService
{
    public function store($request)
    {

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $pathFull = 'uploads';
            $destinationPath = public_path('storage/' . $pathFull);
            $file->move($destinationPath, $name);
            return '/shop'.'/public'.'/storage/' . $pathFull . '/' . $name;//chạy gòi tuyệt vời 3 ngày 3 đêm

        }

    }
}
