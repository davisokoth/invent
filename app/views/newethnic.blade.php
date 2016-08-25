@extends('layouts.blank')
@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="box dark">
            <header>
                <div class="icons">
                    <h5><i class="icon-trophy"></i></h5>
                </div>
                <div class="icons">
                  <h5><a href="{{URL::route('ethnics.list')}}">Ethnic Groups</a></h5>
                </div>
                <div class="icons">
                    <h5>Create New</h5>
                </div>
            </header>

            <p>&nbsp;</p>
            @foreach ($errors->all() as $error)
            <div class="alert">
                <button class="close" data-dismiss="alert">&times;</button>
                <strong>Warning!</strong> {{ $error }}
            </div>
            @endforeach

            {{ Form::open(array( 'route'    =>  'ethnics.start' )) }}
            <div class="col-sm-16">
              <h5>Details:</h5>
              <div class="box">
                <div class="row">
                      {{ Form::text(
                        'value',
                        Input::old('value'),
                        array(
                            'id' => 'value',
                            'type' => 'text',
                            'class' => '',
                            'placeholder'=>'Code',
                            'required' => 'required'
                        )
                      ) }}
                      {{ Form::text(
                        'name',
                        Input::old('name'),
                        array(
                            'id' => 'name',
                            'type' => 'text',
                            'class' => '',
                            'placeholder'=>'Name',
                            'required' => 'required'
                        )
                      ) }}
                </div>
                <div class="row"> 
                      {{ Form::text(
                        'description',
                        Input::old('description'),
                        array(
                            'id' => 'description',
                            'type' => 'text',
                            'class' => '',
                            'placeholder'=>'Description'
                        )
                      ) }}
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <hr class="lighten">
                <div class="row">
                  <div class='col-sm-4'>
                    <div class="form-group">
                      <input type="submit" class="btn btn-info" value="Add Ethnic Group" name="register" id="register"/>
                                  <input type="button" class="btn btn-danger" value="Cancel" name="reset" id="reset"/>
                    </div>
                  </div>
                </div>
                <div id="clear"></div>
                <input type="text" id="uncode" name="uncode" placeholder="uncode" class="invisible">
            {{Form::close()}}
        </div>
    </div>
</div><!-- END PRIMARY -->
@stop