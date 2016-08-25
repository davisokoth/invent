@extends('layouts.blank')
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="box dark">
            <header>
                <div class="icons">
                  <h5><a href="{{URL::route('routes.clientroutes', $clientid)}}">Routes</a></h5>
                </div>
                <div class="icons">
                    <h5><i class="icon-road"></i> Create New</h5>
                </div>
            </header>

            <p>&nbsp;</p>
            @foreach ($errors->all() as $error)
            <div class="alert">
                <button class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> {{ $error }}
            </div>
            @endforeach
<!--------------------------- Form Start ---------------------------------------------->
            {{ Form::open(array( 'route'	=>	'routes.start' )) }}
               	<div class="col-sm-16">
                  <div class="box" id="vehicle">
                    <div class="row">
                      {{ Form::text(
                        'name',
                        Input::old('name'),
                        array(
                            'id' => 'name',
                            'type' => 'text',
                            'placeholder'=>'Route Name',
                            'required' => 'required'
                        )
                      ) }}
                    </div>
                    <div class="row">
                      {{ Form::text(
                        'stops',
                        Input::old('stops'),
                        array(
                            'id' => 'stops',
                            'type' => 'text',
                            'placeholder'=>'No of Stops',
                            'required' => 'required'
                        )
                      ) }}
                    </div>
                    <div class="row">
                      {{ Form::select(
                        'vehicle',
                        $vehicles,
                        null,
                        array(
                            'id' => 'vehicle',
                            'required' => 'required'
                        )
                      ) }}
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="clientid" value="{{$clientid}}" />
                 	  <hr class="lighten">
                    <div class="row">
                      <div class='col-sm-4'>
                        <div class="form-group">
                          <input type="submit" class="btn btn-info" value="Add Route" name="register" id="register"/>
        						      <input type="button" class="btn btn-danger" value="Cancel" name="reset" id="reset"/>
                        </div>
                      </div>
                    </div>
                    <div id="clear"></div>
                    <input type="text" id="uncode" name="uncode" placeholder="uncode" class="invisible">
          			  {{Form::close()}}
          		</div>
@stop