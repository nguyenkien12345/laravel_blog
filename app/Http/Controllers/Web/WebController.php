<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Contact;
use Auth;
use DB;

class WebController extends Controller
{

    private $category;
    private $post;
    private $comment;
    private $contact;

    public function __construct(Category $category, Post $post, Comment $comment, Contact $contact)
    {
        $this->category = $category;
        $this->post = $post;
        $this->comment = $comment;
        $this->contact = $contact;
    }

    public function showLogin()
    {
        return view('web.login.index');
    }

    public function checkLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password]) || Auth::attempt(['mobile' => $request->username, 'password' => $request->password])) {
            return redirect()->route('home');
        }
        return redirect()->route('show-login')->with('error', 'Tài khoản không hợp lệ');
    }

    public function home()
    {
        $highLightPost = $this->post->where('highlight_post', 1)->orderBy('created_at', 'desc')->take(3)->get();
        $newPost = $this->post->where('new_post', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return view('web.home.index', compact('highLightPost', 'newPost'));
    }

    public function category()
    {
        $posts = $this->post->all();
        $categories = $this->category->all();
        return view('web.categories', compact('posts', 'categories'));
    }

    public function categoryPost($slug)
    {
        $categories = $this->category->all();
        $category = $this->category->where('slug', $slug)->first();
        $posts = $this->post->where('category_id', $category->id)->get();
        return view('web.categories', compact('posts', 'categories'));
    }

    public function postDetail($slug)
    {
        try {
            DB::beginTransaction();

            $post = $this->post->where('slug', $slug)->first();
            $post->increment('view_counts', 1);

            $relatedPost = $this->post->where('category_id', $post->category_id)->take(2)->inRandomOrder()->get();
            $hlPost = $this->post->where('highlight_post', 1)->take(3)->inRandomOrder()->get();

            DB::commit();
            return view('web.post', compact('post', 'relatedPost', 'hlPost'));
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function comment(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $comment = $this->comment->create([
                'content' => $request->content,
                'user_id' => Auth::id(),
                'post_id' => $id
            ]);

            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function contact()
    {
        return view('web.contact.index');
    }

    public function sendContact(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];

        $message = [
            'name.required' => 'Vui lòng nhập name',
            'address.required' => 'Vui lòng nhập address',
            'phone.required' => 'Vui lòng nhập phone',
            'subject.required' => 'Vui lòng nhập subject',
            'message.required' => 'Vui lòng nhập message'
        ];

        $request->validate($rules, $message);
        try {
            DB::beginTransaction();

            $contact = $this->contact->create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Gửi thông tin thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
