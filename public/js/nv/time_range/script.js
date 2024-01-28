/**
* 120 ==> 02:00
*/
function m2h (min, step) {
  step = step || 1
  var h = parseInt(min / 60), m = min % 60, s = m % step

  if (s > 0) {
    if (m < 5) {
      m == 1 && (m = m - 1)
      m == 2 && (m = m - 2)
      m == 3 && (m = m + 2)
      m == 4 && (m = m + 1)
    } else if (m > 55) {
      m == 56 && (m = 50)
      m == 57 && (m = 50)
      m == 58 && (m = 50)
      m == 59 && (m = 50)
    } else {
      s < 3 && (m = m - s)
      s >= 3 && (m = m + (5 - s))
    }
  }

  h = h < 10 ? '0' + h : h
  m = m < 10 ? '0' + m : m
  return (h + ":" + m)
}

/**
* str: "02:00-03:00" ==> 120 180
*/
function h2m (str) {
  str = str.split('-')
  return {
    from : str[0].split(':')[0] * 60 + str[0].split(':')[1] * 1,
    to   : str[1].split(':')[0] * 60 + str[1].split(':')[1] * 1
  }
}

function timeRange2String (from, to) {
  return from + '-' + to
}
var $rangSliderBox =  $('.range-input-div')
var $close = $rangSliderBox.find('.close')
var $tr = $('.time-range-input')
var slider = $('.time-range-input').data("ionRangeSlider")

$('#btn_working_time').click(function(ev) {
  var $this = $(this)
  ev.stopPropagation()
  $rangSliderBox.toggle()
  $close.on('click', function() {
    $rangSliderBox.hide()
  })
  $('.range-mask').show().click(function() {
    $(this).hide()
    $rangSliderBox.hide()
  })
  
  $tr.ionRangeSlider({
    type: "double",
    grid: true,
    min: 1,
    max: 60 * 24 - 5,
    from: 60 * 8,
    to: 60 * 20,
    step: 5,
    keyboard: true,
    min_interval: 10,
    force_edges: false,
    prettify: function (num) {
      return m2h(num)
    },
    onStart: function () {
      
    },
    onChange: function (data) {
      $('#start').val(m2h(data.from));
      $('#end').val(m2h(data.to));
        var trs = timeRange2String(m2h(data.from), m2h(data.to))
     //   console.log('change: ', trs)
        $this.find('.value').text(trs)
    },
    onFinish: function (data) {
      $('#start').val(m2h(data.from));
      $('#end').val(m2h(data.to));
        var trs = timeRange2String(m2h(data.from), m2h(data.to))
     //   console.log('finished: ', trs)
    },
    onUpdate: function (data) {
      $('#start').val(m2h(data.from));
      $('#end').val(m2h(data.to));
        var trs = timeRange2String(m2h(data.from), m2h(data.to))
      //  console.log('updated: ', trs)
    }
 })
  
  var slider = $('.time-range-input').data("ionRangeSlider")
  
  slider.update(h2m($this.find('.value').text()))
})