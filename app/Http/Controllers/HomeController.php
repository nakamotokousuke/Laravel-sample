<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Memo;
use App\Models\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();
        $memos = Memo::where('user_id', $user['id'])->get();
        $tags = Tag::where('user_id', $user['id'])->get();
        return view('database', compact('memos', 'tags'));
    }
    public function create(Request $request)
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $user = \Auth::user();
        $memo_id = Memo::insertGetId(['title' => $data['title'], 'content' => $data['content'], 'user_id' => $user['id'],]);
        Tag::insert(['name' => $data['tag'], 'user_id' => $user['id'], 'memo_id' => $memo_id]);
        return redirect()->route('home');
    }
    public function view(Request $request, $id)
    {
        $memo = Memo::where('id', $id)->first();
        $tags = Tag::where('memo_id', $id)->get();
        return view('view', compact('memo', 'tags'));
    }
    public function edit(Request $request, $id)
    {
        $inputs = $request->all();
        Memo::where('id', $id)->update(['title' => $inputs['title'], 'content' => $inputs['content']]);
        Tag::where('memo_id', $id)->update(['name' => $inputs['tag']]);
        return redirect()->route('home');
    }
    public function delete($id)
    {
        $user = \Auth::user();
        // $tags = Tag::where('user_id', $user['id'])->get();
        Memo::where('id', $id)->delete();
        Tag::where('memo_id', $id)->delete();
        return redirect()->route('home');
    }
}
