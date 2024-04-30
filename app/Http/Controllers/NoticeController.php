<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = DB::table('notices')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pages.admin.notice.index', compact('notices'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.notice.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create the notice
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->save();

        // Redirect to the index page with a success message
        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notice = Notice::findOrFail($id);
        return view('pages.admin.notice.edit', compact('notice'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Find the notice by ID
        $notice = Notice::findOrFail($id);

        // Update the notice with new data
        $notice->title = $request->title;
        $notice->content = $request->content;

        // Save the updated notice
        $notice->save();

        // Redirect back with success message
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully');
    }

     public function ownerNotice(){
        $notices = DB::table('notices')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('pages.owner.notice.index', compact('notices'));
     }

}
