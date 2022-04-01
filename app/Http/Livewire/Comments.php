<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Str;

class Comments extends Component
{

    public $comments;
    public Comment $comment;
    public $newComment;

    public function mount()
    {
        $this->comments = Comment::latest()->get();


    }
    public function store()
    {
        if (Str::of($this->newComment)->isEmpty()) {
            return;
        }

        $createdComment = Comment::create(
            [
                'body' => $this->newComment,
                'user_id' => rand(1,10)
            ]
        );
        $this->comments->prepend($createdComment) ;

        $this->reset('newComment');
    }

    public function delete($id)
    {
        Comment::destroy($id);
        $this->comments= Comment::latest()->get();
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
