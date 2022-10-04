<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithPagination;

class CommentCrudWidget extends Component
{

    use WithPagination;

    public $users;
    public $user_id;
    public $randomUser;
    public $randomImage;
    public $randomName = 'The Mandalorian';
    public $jobTitle = 'Galactic Bounty Hunter';
    public $birthday = '07/14/1987';
    public $gender = 'male';
    public $phone = '615-347-7343';
    public $email = 'itssimplescience@gmail.com';
    public $commentsCount = 0;
    public $productsCount = 0;
    public $product_id;
    public $body;
    public $comment;
    public $comment_id;
    public $comments;
    public $commentLabel = 'Add Comment';
    public $replies;
    public $reply;
    public $withTrashed = false;
    public $randomCategory = '';
    public $category_id;
    public $categories;
    public $reasonMessage = 'There a no users in the Database. Please run migration & seeder file. Follow link below for docs.';
    public $showDocsButton = false;
    public $homeTitle = 'Take Home Assestment';
    public $homeShareTitle = 'Senior BackEnd Developer - Assestment';
    public $homeDescription = 'This is my take home assetment as proof of my skills as a Full Stack Developer appllying for BackEnd Developer Laravel role.';
    public $homeImage;
    public $homeKeyWords;
    public $likesCount = 0;
    public $dislikesCount = 0;
    public $editComment = false;
    public $showComment = false;
    public $actual_link;
    public $homeLink;
    public $root;
    public $avatarsFolder = '/assets/media/avatars/';
    public $url;
    public $profile_url = '300-1.jpg';

    protected $paginationTheme = 'bootstrap';


    protected $rules = [

        'reply' => 'required_without:body',
        'comment_id' => 'required_with:reply',
        'body' => 'required|min:6|string',
        'user_id' => 'required|integer',
        'product_id' => 'required|integer',

    ];

    /**
     * Listener to refresh component when needed.
     * @var string[]
     */
    protected $listeners = [

        'refreshComponent' => '$refresh',

    ];

    /**
     * Generate a collection of random images that will be used later by the app when assigning profile image
     * @return void
     */
    public function mount($product_id = null):void
    {

        $this->actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->homeLink = "http://$_SERVER[HTTP_HOST]";
        $this->root = URL::to('/');
        $this->url = $this->root . '' . $this->avatarsFolder;

        if ($product_id) {

            $this->product_id = $product_id;

        }

        $this->users = User::with(['products', 'comments'])
            ->has('products')
            ->get();

        $this->categories = ProductCategory::all();

        if ($this->categories->count()) {

            $this->randomCategory = $this->categories->random();
            $this->category_id = $this->randomCategory->id;

        }

        //if users exist get a random user from the collection, so that we can use it when creating comments or replies
        if ($this->users->count()) {

            $this->randomUser = $this->users->random();
            $this->user_id = $this->randomUser->id;
            $this->randomImage = $this->url . '' . $this->randomUser->profile_url;
            $this->randomName = $this->randomUser->name;
            $this->jobTitle = $this->randomUser->job_title;
            $this->gender = $this->randomUser->gender;
            $this->phone = $this->randomUser->phone;
            $this->birthday = $this->randomUser->birthday;
            $this->email = $this->randomUser->email;
            $this->productsCount = $this->randomUser->products()->count();
            $this->commentsCount = $this->randomUser->comments()->count();
            $this->reasonMessage = 'Users Now Exist In The Database, Any comment you create will be posted as a random user that exists in Database.';

        }
        else {

            $this->user_id = null;
            $this->showDocsButton = true;
            $this->randomImage = $this->url . '' . $this->profile_url;

        }

    }

    public function render()
    {

        if ($this->withTrashed) {

            $this->comments = Comment::withTrashed()
                ->with(['author', 'replies'])
                ->get();

        }
        else {

            // get active comments only
            $this->comments = Comment::with(['author'])
                ->active()
                ->get();

        }

        if ($this->product_id) {

            $this->comments = Comment::where('product_id', $this->product_id)->get();

        }

        return view('livewire.comment-crud-widget');

    }

    /**
     * Increase the number of likes
     * @return void
     */
    public function increaseLikes($comment_id)
    {
        $comment = Comment::find($comment_id);

        if (!$comment) {

            session()->flash('message', 'Comment not found.');

        }
        else {

            $comment->addLike();
        }

        $this->emitSelf('refreshComponent');

    }

    /**
     * Increase the number of dislikes
     * @return void
     */
    public function increaseDislikes($comment_id)
    {

        $comment = Comment::find($comment_id);

        if (!$comment) {

            session()->flash('message', 'Comment not found.');

        }
        else {

            $comment->addDislike();
            $this->emitSelf('refreshComponent');

        }

    }

    /**
     * Create A New Comment
     * @return void
     */
    public function createNewComment()
    {
        $this->validate();

        if ($this->reply) {
            $body = $this->reply;
        } else {
            $body = $this->body;
        }
        $comment = new Comment;
        $comment->body = $body;
        $comment->user_id = $this->user_id;
        $comment->product_id = $this->product_id;
        if ($this->comment_id) {
            $comment->comment_id = $this->comment_id;
        }
        $comment->save();

        if (!$this->comment) {
            session()->flash('message', 'Something went wrong, try again.');

        }
        else {

            $this->comment = $comment;
            session()->flash('message', 'New comment created.');
            $this->emitSelf('refreshComponent');
        }

    }

    public function addReply($comment_id)
    {
        $this->validate();

        $comment = new Comment;
        $comment->body = $this->body;
        $comment->user_id = $this->user_id;
        $comment->comment_id = $comment_id;
        $comment->save();

        if (!$this->comment) {

            session()->flash('message', 'Something went wrong, try again.');

        }
        else {

            $this->comment = $comment;
            $this->replies = $comment->replies;

            session()->flash('message', 'New reply added.');
            $this->emitSelf('refreshComponent');
        }

    }

    public function showComment($comment_id)
    {

        $this->editComment = true;
        $this->comment = Comment::with('replies')
            ->where('id', $comment_id)
            ->first();

        if (!$this->comment) {

            session()->flash('message', 'Comment is not found!!.');
        } else {

            $this->body = $this->comment->body;
            $this->profile_url = $this->comment->profile_url;
            $this->randomName = $this->comment->user_name;

        }

    }

    public function editComment($comment_id)
    {

        $this->editComment = true;
        $this->commentLabel = 'Edit Comment';

        $this->comment = Comment::with(['author', 'replies'])
            ->where('id', $comment_id)
            ->first();

        if (!$this->comment) {

            session()->flash('message', 'Comment is not found!!.');

        } else {

            $this->body = $this->comment->body;
            $this->randomImage = $this->url . '' . $this->comment->author->profile_url;
            $this->randomName = $this->comment->author->name;
        }

    }

    /**
     * Update Comment
     * @param $comment_id
     * @return void
     */
    public function updateComment($comment_id)
    {

        $this->comment = Comment::with('replies')
            ->where('id', $comment_id)
            ->first();

        $this->comment->update([
            'body' => $this->body,
        ]);

        $this->reset();
        $this->emitSelf('refreshComponent');

    }

    /**
     * Delete the comment & its chidren replies
     * @param $comment_id
     * @return void
     */
    public function deleteComment($comment_id)
    {

        if ($comment_id) {

            $this->comment = Comment::where('id', $comment_id)
                ->delete();
        }

        session()->flash('deleted', 'Comment Deleted');
        $this->emitSelf('refreshComponent');

    }

}
