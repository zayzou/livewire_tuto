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
    protected $rules = ['newComment'=>'required|min:8|max:40'];


    public function mount()
    {
        $this->comments = Comment::latest()->get();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();

        $createdComment = Comment::create(
            [
                'body' => $this->newComment,
                'user_id' => rand(1,10)
            ]
        );
        $this->comments->prepend($createdComment) ;
        $this->reset('newComment');
        session()->flash('message','Comment created successfuly 🤩');
    }


    public function delete($id)
    {
        Comment::destroy($id);
        // $this->comments = $this->comments->where('id','!=',$id);
        $this->comments = $this->comments->except($id);
        session()->flash('message','Comment deleted successfuly 🫥');
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
