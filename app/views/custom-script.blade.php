{{ HTML::script('js/tipsy.js')}}
{{ HTML::script('js/jquery-ui.min.js')}}
{{ HTML::script('js/jquery.mobilemenu.js')}}
{{ HTML::script('js/responsive.js')}}
{{ HTML::script('sliders/elastic/js/jquery.eislideshow.js')}}
{{ HTML::script('js/jquery.custom.js')}}

{{ HTML::script('js/jquery.easing.1.3.js')}}
{{ HTML::script('js/jquery.timers.1.2.js')}}
{{ HTML::script('js/slippry.min.js')}}
{{ HTML::script('js/selectize.min.js')}}

<script type="text/javascript">

var root = '{{url("/")}}';

jQuery(document).ready(function(){
  jQuery('#featured_slide').slippry();

  jQuery('#searchbox').selectize({
        valueField: 'url',
        labelField: 'name',
        searchField: ['name'],
        maxOptions: 8,
        maxItems : 1,
        options: [],
        create: false,
        openFocus : true,
        render: {
            option: function(item, escape) {
                return '<div>' +escape(item.name)+'</div>';
            }
        },
        optgroups: [],
        optgroupField: 'class',
        optgroupOrder: [],
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+'/parent/jsonlist',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });
});

$(function() {
/**
  $('#testform').submit(function(e){
    e.preventDefault();
  });
**/

  $('#parent').selectize({create: true});
  $('#tags').selectize({
    delimiter: ',',
    persist: true,
    create: function(input) {
      return {
        value: input,
        text: input
      }
    }
  });
});

</script>
<!--
{{ HTML::script('js/jquery.galleryview.2.1.1.min.js')}}
{{ HTML::script('js/jquery.galleryview.setup.js')}}
-->