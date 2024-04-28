<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($flat_id)
    {

    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'comment' => 'required|string',
            'flat_id' => 'required', // Validate that the flat_id exists in the flats table
            'rating' => 'required', // Validate the rating input
        ]);

        // Create a new Comment instance
        $comment = new Comment();
        $comment->user_id = auth()->id(); // Assign the authenticated user's ID
        $comment->flat_id = $request->input('flat_id');
        $comment->comment = $request->input('comment');
        $comment->rating = $request->input('rating');

        // Save the comment
        $comment->save();

        // Redirect back with a success message
        return back()->with('success', 'Comment submitted successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the comment by ID
        $comment = Comment::find($id);

        // Delete the comment
        $comment->delete();
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
