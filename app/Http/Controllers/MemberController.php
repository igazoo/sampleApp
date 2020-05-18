<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

//従業員のデータ
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = DB::table('members')
        ->select('id','member_name','gender','type')
        ->get();

        return view('member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $member = new Member;

        $member->member_name = $request->input('member_name');
        $member->gender = $request->input('gender');
        $member->type = $request->input('type');

        $member->save();

        return redirect('member/index');
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
        $member = Member::find($id);

        if($member->gender===0){
            $gender ="男性";
          }

        if($member->gender === 1){
            $gender = ' 女性';
          }

        if($member->type ===1){
          $type = '社員';
        }elseif($member->type === 2){
          $type = '大学生バイト';
        }else{
          $type = '高校生バイト';
        }
        return view('member.show',compact('member','gender','type'));
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $member = Member::find($id);

      return view('member.edit',compact('member'));
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
        //
        $member = Member::find($id);
        $member->member_name = $request->input('member_name');
        $member->gender = $request->input('gender');
        $member->type = $request->input('type');

        $member->save();
        return redirect('member/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $member = Member::find($id);
        $member->delete();
        return redirect('member/index');
    }
}
