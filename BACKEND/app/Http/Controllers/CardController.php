<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::where(['card_id' => $request->card_id])->first()) {
            return ['status' => false, 'message' => 'Thẻ đã tồn tại trong cơ sở dữ liệu'];
        }

        User::create($request->all());

        return ['status' => true, 'message' => 'Nhập dữ liệu thành công'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!User::where(['card_id' => $request->card_id])->first()) {
            return ['status' => false, 'message' => 'Thẻ không tồn tại trong cơ sở dữ liệu'];
        }

        User::where(['card_id' => $id])->update($request->all());

        return ['status' => true, 'message' => 'Lưu dữ liệu thành công'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where(['card_id' => $id])->delete();
        return ['status' => true, 'message' => 'Xóa thẻ thành công'];
    }
}
