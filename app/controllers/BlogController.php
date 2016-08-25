<?php

use Illuminate\Support\MessageBag;

class BlogController extends BaseController {

	private $messageBag;

	public function __construct(){
		$messageBag= new MessageBag;
	}

	public function home()
	{
	    $blogs = Blog::with('user')
            ->orderby('publishdate', 'desc')->take(10)->get();
	    return View::make('bloglist')->with('blogs', $blogs);
	}

	public function start()
	{
		return View::make('newblog');
	}

	

	public function doNew()
	{
		$rules = array(
			'title'		 => 'required|min:3',
			'entry'      => 'required|min:3',
			'brief'      => 'required|min:3'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Register the user
		$blog = new Blog;
		$blog->title    	= Input::get('title');
		$blog->entry 		= Input::get('entry');
		$blog->brief 		= Input::get('brief');
		$blog->publishdate	= date('Y-m-d');
		$blog->ispublished 	= 'Y';
		$blog->numberviews 	= 0;
		$blog->author 		= Sentry::getUser()->id;
		$blog->isactive		= 'Y';

		$blog->save();

		$insertedId = $blog->id;


		// Ooops.. something went wrong
		if($insertedId==null) return Redirect::back()->withInput()->withErrors('Saving failed!');

		if (Input::hasFile('banner'))
		{
		    $file = Input::file('banner');
		    $file->move('images/blog', $file->getClientOriginalName());
		    $blog->blogimage 	= str_replace(' ', '', $file->getClientOriginalName());
		    $blog->save();
		}

		$blog = Blog::find($insertedId);
		$blogs = Blog::with('user')
            		->orderby('publishdate', 'desc')->take(10)->get();
		return View::make('blog')->with(array('blog'=>$blog, 'blogs'=>$blogs));
	}

	public function getBlog($id)
	{
		$blog = Blog::with('user')
            		->find($id);
		$blog->numberviews = $blog->numberviews + 1;
		$blog->save();
		$blogs = Blog::orderby('publishdate', 'desc')->take(10)->get();
		return View::make('blog')->with(array('blog'=>$blog, 'blogs' => $blogs));
	}

	public function report($id)
	{
		if (!Sentry::check())
		{
			// return View::make('lgnpg');
		}
		$blog = Blog::where('categories.id', $id)->first();
		return View::make('djobpg')->with(array('job'=>$blog, 'comments'=>$comments, 'bids'=>$bids));
	}

	// --------------------------------------------------------------
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
