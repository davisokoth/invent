@extends('layouts.main')
@section('head')
    @parent
    <title>ALIVE Kenya | Welcome</title>
@stop

@section('body')
<div id="primary" class="sidebar-right">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-page" class="span9 content group">
                <div class="page type-page status-publish hentry group">
                    @if (Session::has('message'))
                        <div class="flash alert">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif
                    <h2>New Event</h2>
                    <p>
                        {{ Former::secure_horizontal_open_for_files()
                            ->id('newevent')->action(URL::route('events.start'))
                            ->rules(['name' => 'required'])->method('POST');
                        }}

                        {{Former::xlarge_text('name')->placeholder('Event Name')->required()}}
                        {{Former::xlarge_text('venue')->placeholder('Event Venue')->required()}}
                        {{Former::xlarge_text('cost')->placeholder('Cost')->required()}}
                        {{Former::select('eventtype')->options(array(
                                'Conference'    => 'Conference',
                                'Mission'       => 'Mission',
                                'Weekend'       => 'Weekend',
                                'Other'         => 'Other'
                        ))}}

                        {{Former::select('recurrence')->options(array(
                            'Daily'         => 'Daily',
                            'Weekly'        => 'Weekly',
                            'Monthly'       => 'Monthly',
                            'Annual'        => 'Annual',
                            'Other'         => 'Other'
                        ))}}
                        {{Former::xlarge_text('startdate')->id('startdate')->placeholder(date('Y-m-d'))->required()}}
                        {{Former::xlarge_text('enddate')->id('enddate')->placeholder(date('Y-m-d'))->required()}}
                        <div class="offset1 content group">
                            {{Form::submit('Create Event', array('class' => 'btn btn-primary', 'id' => 'form-submit'))}}
                            {{Form::reset('Reset Form', array('class' => 'btn btn-error', 'id' => 'form-reset'))}}
                        </div>
                        {{Former::close()}}
                    </p>
                </div>
                <!-- START COMMENTS -->
                <div id="comments"></div>
                <!-- END COMMENTS -->
            </div>

            <div class="border-line"></div>

            <div class="section ch-grid">
                    <!-- START EXTRA CONTENT -->
                    <div class="extra-content group span12">
                        <p>&nbsp;</p>
                        <p>Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum </p>
                    </div>
                </div>
                <!-- END EXTRA CONTENT -->
            </div>

            <!-- END CONTENT -->


        </div>
    </div>
</div><!-- END PRIMARY -->
@stop

@section('footer')
    @parent
@stop