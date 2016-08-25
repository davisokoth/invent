<?php

use Illuminate\Support\MessageBag;

class CategoryController extends BaseController {

	private $messageBag;

	public function __construct(){
		$messageBag= new MessageBag;
	}

	public function home()
	{
		if (!Sentry::check())
		{
			// return View::make('lgnpg');
		}
		$categories = Category::get();
	    return View::make('categorieslist')->with('categories', $categories);
	}

	public function all()
	{
		if (!Sentry::check())
		{
			// return View::make('lgnpg');
		}

		// $users = User::where_in('id', array(1, 2, 3))->or_where('email', '=', $email)->get();

		$categories = Category::get()->orderby('categories.name', 'asc')->paginate(20);
	    return View::make('categorieslist')->with('categories', $categories);
	}

	public function doNew()
	{
		if (!Sentry::check())
		{
			return View::make('lgnpg');
		}
		$rules = array(
			'name'		       => 'required|min:3',
			'description'      => 'required|min:3'
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
		$category = new Category;
		$category->name     	= Input::get('name');
		$category->description 	= Input::get('description');
		$category->active		= 'Y';

		$category->save();

		$insertedId = $category->id;


		// Ooops.. something went wrong
		if($insertedId==null) return Redirect::back()->withInput()->withErrors('Saving failed!');
		return Redirect::back();
	}

	public function getcategory($id)
	{
		if (!Sentry::check())
		{
			// return View::make('lgnpg');
		}
		$category = Category::where('categories.id', $id)->first();
		return View::make('djobpg')->with(array('job'=>$category, 'comments'=>$comments, 'bids'=>$bids));
	}

	public function report($id)
	{
		if (!Sentry::check())
		{
			// return View::make('lgnpg');
		}
		$category = Category::where('categories.id', $id)->first();
		return View::make('djobpg')->with(array('job'=>$category, 'comments'=>$comments, 'bids'=>$bids));
	}

	public function getJSONCategory()
    {
        $term      = Input::get('term');
        $categories = array();
        $search    = DB::select("select id , name from categories
        	where match (name) against ('+{$term}*' IN BOOLEAN MODE)"
        );

        foreach ($search as $result) {
            $categories[] = $result;

        }

        return json_encode($categories);

    }

    public function mypost(){
    	// Retrieve the user's input and escape it
		  $query = e(Input::get('q',''));

		  // If the input is empty, return an error response
		  // if(!$query && $query == '') return Response::json(array(), 400);

		  $categories = Category::where('name','like','%'.$query.'%')
  			->take(5)
  			->get(array('id', 'name'))
  			->toArray();

		  return Response::json(array(
		    'data'=>$categories
		  ));
    }

    public function post(){
    	// Retrieve the user's input and escape it
		  $categories = Category::where('name','like','%te%')
  			->take(5)
  			->get(array('id', 'name'))
  			->toArray();

		  return Response::json(array(
		    'data'=>$categories
		  ));
    }


	// --------------------------------------------------------------
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */