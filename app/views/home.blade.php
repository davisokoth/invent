@extends('layouts.main')
@section('head')
    @parent
    <title>Andela | Inventory System</title>
@stop

@section('body')

<h3>Search Products</h3>
@foreach ($errors->all() as $error)
<div class="alert">
    <button class="close" data-dismiss="alert">&times;</button>
    <strong>Warning!</strong> {{ $error }}
</div>
@endforeach
<div class="panel panel-default" id="the-basics">
    {{ Form::open(array( 'route'	=>	'products.search' )) }}
        <div class="col-sm-16">
            <div class="col-sm-12">
                {{ Form::text(
                    'search',
                    Input::old('search'),
                    array(
                        'id' => 'tSearch',
                        'class' => 'form-control col-sm-8',
                        'type' => 'text',
                        'placeholder'=>'Search by product name or category',
                        'required' => 'required'
                    )
                ) }}
                <div class="col-sm-4">
                    <input type="submit" class="btn btn-info" value="Search" name="bSearch" id="bSearch"/>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="text" id="uncode" name="uncode" placeholder="uncode" class="invisible">
        </div>
    {{Form::close()}}
</div>

<h3>Search Results</h3>
<table id="dTable" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Code</th><th>Name</th><th>Price</th><th>Category</th>
        </tr>
    </thead>
    <tbody>
            @foreach($products as $a)
                <tr>
                    <td>{{$a->value}}</td>
                    <td><a href="#">{{$a->name}}</a></td>
                    <td>{{$a->price->price}}</a></td>
                    <td>{{$a->category->name}}</td>
                </tr>
            @endforeach
    </tbody>
</table>
@stop