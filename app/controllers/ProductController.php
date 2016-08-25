<?php
class ProductController extends BaseController {

	public function search()
	{
		$rules = array(
			'search' => 'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		
		$searchTerm = Input::get('search');

		$products = Product::with('category')
		->leftJoin('categories', 'categories.id', '=', 'products.category_id')
		->with('price')
		->where('categories.name', 'LIKE', '%'.$searchTerm.'%')
		->orWhere('products.name', 'LIKE', '%'.$searchTerm.'%')
		->orderBy('products.value', 'desc')
		->get();
		

	    return View::make('home')->with('products', $products);
	}

	// --------------------------------------------------------------
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */