<?php
class WelcomeController extends BaseController {

	public function home()
	{
		$products = Product::with('category')
		->with('price')
		->where('isactive', 'Y')
		->orderBy('value', 'desc')
		->get();
		return View::make('home')->with(array('products' => $products));
	}

	// --------------------------------------------------------------
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
