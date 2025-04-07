<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function store(Request $request, Car $car)
    {
        $this->authorize('create', [Comment::class, $car]);

        $validated = $request->validate([
            'content' => 'required|string|max:1000',
            'date' => 'nullable|date',
            'store' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
        ]);

        // Pārliecināmies, ka links sākas ar http:// vai https://
        if ($validated['link'] && !Str::startsWith($validated['link'], ['http://', 'https://'])) {
            $validated['link'] = 'https://' . $validated['link'];
        }

        $car->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'date' => $validated['date'] ?? now(),
            'store' => $validated['store'],
            'link' => $validated['link'],
        ]);

        return redirect()->route('cars.show', $car)
            ->with('success', 'Komentārs pievienots!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Komentārs dzēsts!');
    }
}
