@extends('layouts.master')

@section('title')
Dashboard | Application
@endsection

@section('content')
<div>
  <div class="col-xs-12">

    <div class="alert alert-block alert-success">
      <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
      </button>
      <i class="ace-icon fa fa-check green"></i>
      Welcome
      <strong class="green">
        {{$user['name']}}
      </strong>!
      @if(count($unreadMessages)>0)
      <i class="ace-icon fa fa-twitter"></i>You have {{count($unreadMessages)}} unread messages.
      @endif
    </div>
    <div class="hr hr32 hr-dotted"></div>

    <div class="row">
      <div class="col-sm-12">
        <div class="widget-box transparent" id="recent-box">
          <div class="widget-header">
            <h4 class="widget-title lighter smaller">
              <i class="ace-icon fa fa-rss orange"></i>RECENT Activity
            </h4>

            <div class="widget-toolbar no-border">
              <ul class="nav nav-tabs" id="recent-tab">
                <li>
                  <!-- <i class="ace-icon fa fa-comments"> -->
                    <a data-toggle="tab" href="#comment-tab">Messages</a>
                  <!-- </i> -->
                </li>
              </ul>
            </div>
          </div>

          <div class="widget-body">
            <div class="widget-main padding-4">
              <div class="tab-content padding-8">

                <div id="comment-tab" class="tab-pane active">
                  <!-- #section:pages/dashboard.comments -->
                  <div class="comments">
                    @foreach($unreadMessages as $message)
                    <div class="itemdiv commentdiv">
                      <div class="user">
                      </div>
                      <div class="body">
                        <div class="name">
                          <a href="#">{{$message['receiver']}}</a>
                          <span class="label label-info arrowed arrowed-in-left">
                            <i class="ace-icon fa fa-clock-o"></i>{{$message['duration']}}
                          </span>
                          <a href="{{url('/message/tosend/'.$message['senderID'])}}">{{$message['sender']}}</a>
                        </div>
                        <div class="time">
                        @if ($message['isRead']==1 && $message['type'] =="receive")
                        <span class="blue"><i class="ace-icon fa fa-check bigger-110"></i>I read it.</span>
                        @endif
                        </div>
                        <div class="text">
                          <i class="ace-icon fa fa-quote-left"></i>
                          {{$message['content']}}
                        </div>
                      </div>
                      <div class="tools">
                        <div class="action-buttons bigger-125">
                          @if ($message['isRead']==0 && $message['type'] =="receive")
                          <a href="{{url('/message/tickmessage/'.$message['messageID'])}}" class="tooltip-success" data-rel="tooltip" title="Read">
                            <span class="green">
                              <i class="ace-icon fa fa-check bigger-110"></i>
                            </span>
                          </a>
                          @endif
                          @if ($message['type'] =="receive")
                          <a href="{{url('/message/tosend/'.$message['senderID'])}}" class="tooltip-success" data-rel="tooltip" title="Reply">
                            <i class="ace-icon fa fa-pencil blue"></i>
                          </a>
                          @endif
                          <a href="{{url('/message/removemessage/'.$message['messageID'])}}" class="tooltip-success" data-rel="tooltip" title="Remove">
                            <i class="ace-icon fa fa-trash-o red"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <div class="hr hr8"></div>

                  <div class="center">
                    <i class="ace-icon fa fa-comments-o fa-2x green middle"></i>

                    &nbsp;
                    <a href="{{url('message/inbox')}}" class="btn btn-sm btn-white btn-info">
                      See all comments &nbsp;
                      <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                  </div>

                  <div class="hr hr-double hr8"></div>

                  <!-- /section:pages/dashboard.comments -->
                </div>
              </div>
            </div><!-- /.widget-main -->
          </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- PAGE CONTENT ENDS -->
  </div><!-- /.col -->
</div>
@endsection

@section('footerjs')

<!--[if lte IE 8]>
  <script src="assets/js/theme/excanvas.js"></script>
<![endif]-->
<script src="assets/js/theme/jquery-ui.custom.js"></script>
<script src="assets/js/theme/jquery.ui.touch-punch.js"></script>
<script src="assets/js/theme/jquery.easypiechart.js"></script>
<script src="assets/js/theme/jquery.sparkline.js"></script>
<script src="assets/js/theme/flot/jquery.flot.js"></script>
<script src="assets/js/theme/flot/jquery.flot.pie.js"></script>
<script src="assets/js/theme/flot/jquery.flot.resize.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
  jQuery(function($) {
    $('.easy-pie-chart.percentage').each(function() {
      var $box = $(this).closest('.infobox');
      var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
      var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
      var size = parseInt($(this).data('size')) || 50;
      $(this).easyPieChart({
        barColor: barColor,
        trackColor: trackColor,
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: parseInt(size / 10),
        animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
        size: size
      });
    })

    $('.sparkline').each(function() {
      var $box = $(this).closest('.infobox');
      var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
      $(this).sparkline('html', {
        tagValuesAttribute: 'data-values',
        type: 'bar',
        barColor: barColor,
        chartRangeMin: $(this).data('min') || 0
      });
    });


    //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
    //but sometimes it brings up errors with normal resize event handlers
    $.resize.throttleWindow = false;

    var placeholder = $('#piechart-placeholder').css({
      'width': '90%',
      'min-height': '150px'
    });
    var data = [{
        label: "social networks",
        data: 38.7,
        color: "#68BC31"
      },
      {
        label: "search engines",
        data: 24.5,
        color: "#2091CF"
      },
      {
        label: "ad campaigns",
        data: 8.2,
        color: "#AF4E96"
      },
      {
        label: "direct traffic",
        data: 18.6,
        color: "#DA5430"
      },
      {
        label: "other",
        data: 10,
        color: "#FEE074"
      }
    ]

    function drawPieChart(placeholder, data, position) {
      $.plot(placeholder, data, {
        series: {
          pie: {
            show: true,
            tilt: 0.8,
            highlight: {
              opacity: 0.25
            },
            stroke: {
              color: '#fff',
              width: 2
            },
            startAngle: 2
          }
        },
        legend: {
          show: true,
          position: position || "ne",
          labelBoxBorderColor: null,
          margin: [-30, 15]
        },
        grid: {
          hoverable: true,
          clickable: true
        }
      })
    }
    drawPieChart(placeholder, data);

    /**
    we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
    so that's not needed actually.
    */
    placeholder.data('chart', data);
    placeholder.data('draw', drawPieChart);


    //pie chart tooltip example
    var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
    var previousPoint = null;

    placeholder.on('plothover', function(event, pos, item) {
      if (item) {
        if (previousPoint != item.seriesIndex) {
          previousPoint = item.seriesIndex;
          var tip = item.series['label'] + " : " + item.series['percent'] + '%';
          $tooltip.show().children(0).text(tip);
        }
        $tooltip.css({
          top: pos.pageY + 10,
          left: pos.pageX + 10
        });
      } else {
        $tooltip.hide();
        previousPoint = null;
      }

    });

    /////////////////////////////////////
    $(document).one('ajaxloadstart.page', function(e) {
      $tooltip.remove();
    });




    var d1 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.5) {
      d1.push([i, Math.sin(i)]);
    }

    var d2 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.5) {
      d2.push([i, Math.cos(i)]);
    }

    var d3 = [];
    for (var i = 0; i < Math.PI * 2; i += 0.2) {
      d3.push([i, Math.tan(i)]);
    }


    var sales_charts = $('#sales-charts').css({
      'width': '100%',
      'height': '220px'
    });
    $.plot("#sales-charts", [{
        label: "Domains",
        data: d1
      },
      {
        label: "Hosting",
        data: d2
      },
      {
        label: "Services",
        data: d3
      }
    ], {
      hoverable: true,
      shadowSize: 0,
      series: {
        lines: {
          show: true
        },
        points: {
          show: true
        }
      },
      xaxis: {
        tickLength: 0
      },
      yaxis: {
        ticks: 10,
        min: -2,
        max: 2,
        tickDecimals: 3
      },
      grid: {
        backgroundColor: {
          colors: ["#fff", "#fff"]
        },
        borderWidth: 1,
        borderColor: '#555'
      }
    });


    $('#recent-box [data-rel="tooltip"]').tooltip({
      placement: tooltip_placement
    });

    function tooltip_placement(context, source) {
      var $source = $(source);
      var $parent = $source.closest('.tab-content')
      var off1 = $parent.offset();
      var w1 = $parent.width();

      var off2 = $source.offset();
      //var w2 = $source.width();

      if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
      return 'left';
    }


    $('.dialogs,.comments').ace_scroll({
      size: 300
    });


    //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
    //so disable dragging when clicking on label
    var agent = navigator.userAgent.toLowerCase();
    if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
      $('#tasks').on('touchstart', function(e) {
        var li = $(e.target).closest('#tasks li');
        if (li.length == 0) return;
        var label = li.find('label.inline').get(0);
        if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
      });

    $('#tasks').sortable({
      opacity: 0.8,
      revert: true,
      forceHelperSize: true,
      placeholder: 'draggable-placeholder',
      forcePlaceholderSize: true,
      tolerance: 'pointer',
      stop: function(event, ui) {
        //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
        $(ui.item).css('z-index', 'auto');
      }
    });
    $('#tasks').disableSelection();
    $('#tasks input:checkbox').removeAttr('checked').on('click', function() {
      if (this.checked) $(this).closest('li').addClass('selected');
      else $(this).closest('li').removeClass('selected');
    });


    //show the dropdowns on top or bottom depending on window height and menu position
    $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
      var offset = $(this).offset();

      var $w = $(window)
      if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
        $(this).addClass('dropup');
      else $(this).removeClass('dropup');
    });

  })
</script>
@endsection