<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Requests\NoticeRequest;
use App\Notice;
use JavaScript;

class ManageNoticeController extends ManageController
{

    public function index()
    {

        JavaScript::put([
            'data' =>  $this->getAllNotices(),
        ]);

        return view('manage.admin.notice.notice', [
            'notices' => $this->getAllNotices(),
        ]);
    }

    public function create()
    {
        return view('manage.admin.notice.addnotice', [
            'notices' => $this->getAllNotices(),
        ]);

    }

    public function store(NoticeRequest $request)
    {

        if($request->seeinstore == 'on') {
            $isonstore = true;
        }else {
            $isonstore = false;
        }

        $notice = new Notice;

        $notice->notice_tag = $request->tag;
        $notice->notice_title = $request->title;
        $notice->notice_content = $request->content;
        $notice->notice_show_on_store = $isonstore;
        $notice->notice_views = 0;
        $notice->save();

        return redirect()->route('notice.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('manage.admin.notice.editnotice', [
            'notice' => $this->getNotice($id),
        ]);
    }

    public function update(NoticeRequest $request, $id)
    {

        if($request->seeinstore == 'on') {
            $isonstore = true;
        }else {
            $isonstore = false;
        }

        $notice = Notice::find($id);

        $notice->update([
            'notice_tag' => $request->tag,
            'notice_title' => $request->title,
            'notice_content' => $request->content,
            'notice_show_on_store' => $isonstore,
        ]);

        return redirect()->route('notice.index');
    }

    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();

        return redirect()->route('notice.index');
    }

    public function internalUpdate(Request $request)
    {
        if($request->seeinstore == 'on') {
            $isonstore = true;
        }else {
            $isonstore = false;
        }

        $notice = Notice::find($request->id);

        $notice->update([
            'notice_tag' => $request->tag,
            'notice_title' => $request->title,
            'notice_content' => $request->content,
            'notice_show_on_store' => $isonstore,
        ]);

        return redirect()->route('notice.index');
    }

    public function internalDelete(Request $request)
    {
        $notice = Notice::find($request->id);
        $notice->delete();

        return redirect()->route('notice.index');
    }


}
