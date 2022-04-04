<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Comments extends Component
{


    use WithPagination;
    use WithFileUploads;

    public $newComment;
    public $image;
    protected $rules = ['newComment'=>'required|min:8|max:40','image'=>'image|max:1024'];




    public function storeImage()
    {
        return $this->image->store('image','public');
    }


    public function storeCommentInDatabase($image)
    {
        Comment::create(
            [
                'body' => $this->newComment,
                'image'=> $image,
                'user_id' => rand(1,10)
            ]
        );
    }

    public function resetComponent()
    {
        $this->reset('newComment','image');

    }
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $this->validate();
        $this->storeCommentInDatabase($this->storeImage());
        $this->resetComponent();

        session()->flash('message','Comment created successfuly 🤩');
    }


    public function delete($id)
    {

        Storage::disk('public')->delete(Comment::find($id)->image);
        Comment::destroy($id);
        // $this->comments = $this->comments->where('id','!=',$id);
        // $this->comments = $this->comments->except($id);
        session()->flash('message','Comment deleted successfuly 🫥');
    }


    public function render()
    {
        return view('livewire.comments',['comments'=> Comment::latest()->paginate(5)]);
    }
}
