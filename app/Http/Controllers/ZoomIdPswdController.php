<?php

namespace App\Http\Controllers;

use App\ZoomIdPswd;
use App\ListName;
use Illuminate\Http\Request;

class ZoomIdPswdController extends Controller
{
    public function index($userid){
      try {

        $listname = ListName::where('userid', $userid)->get();
        //useridの授業データを取得
        $zoomidpswdData = ZoomIdPswd::where('userid', $userid)->get();
        //データの整形
        $zoomData = [];
        foreach ($listname as $l_name) {
          $zoomData[$l_name->list_name] = array();
        }

        foreach ($zoomidpswdData as $data) {

          $zoomData[$data->list_name][] = array(
            'id'=>$data->id,
            'zoom_id'=>$data->zoom_id,
            'zoom_pswd'=>$data->zoom_pswd,
            'updated_at'=>$data->updated_at,
          );
        }//foreach
        return $zoomData;
        // return $listname;
      } catch (\Exception $e) {
        return $e->getMessage();
      }


    }

    public function createCard(Request $request){
      //送られてきたuserid,lecturename,zoom_id,zoom_date,zoom_pswdをDBに保存。
      try {
      // return $request;
        $zoomidpswd = ZoomIdPswd::create([
          'userid' => $request->userid,
          'list_name' => $request->listname,
          'zoom_id' => $request->zoomid,
          'zoom_pswd' => $request->zoompswd,
        ]);
      } catch (\Exception $e) {
        return $e->getMessage();
      }
        return $zoomidpswd;
        // return (String)$userid;

  }

    public function createList(Request $request){
      try {

        $listname = ListName::create([
          'userid' => $request->userid,
          'list_name' => $request->listname,
        ]);
        return $listname;
      } catch (\Exception $e) {
        return $e->getMessage();
      }

    }


    public function update(Request $request) {
    //データの更新
      try {
        $zoomidpswd = ZoomIdPswd::where("id", $request->id)
        ->update([
          'zoom_id' => $request->zoomid,
          'zoom_pswd' => $request->zoompswd,
        ]);
        return $zoomidpswd;
      } catch (\Exception $e) {
        return $e->getMessage();
      }

    }

    public function destroy(Request $request){
      if (isset($request->id)) {
        //一つのレコードだけを削除する。
      try {
        $delete = ZoomIdPswd::where('id', $request->id)
                ->delete();
        // return $delete;
      } catch (\Exception $e) {
             return $e->getMessage();
      }
      return $request;
    }elseif (isset($request->listname)) {
      // listnameしかセットされていない場合は、そのlistnameのレコードを全て削除
      try {
        //Delete List
        $delete = ZoomIdPswd::where('userid', $request->userid)
                  ->where('list_name', $request->listname)
                  ->delete();
        $deleteListName = ListName::where('userid', $request->userid)
                  ->where('list_name', $request->listname)
                  ->delete();
        // return $delete;
      } catch (\Exception $e) {
        return $e->getMessage();
      }
      return $request;
    }//...if

  }//...destroy()


}
