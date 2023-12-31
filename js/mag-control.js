(function (root, factory) {
  var name = 'MagnificentControl';
  if (typeof define === 'function' && define.amd) {
    define(['jquery', './mag-analytics', 'jquery-bridget'], function (jQuery, MagnificentAnalytics) {
        return (root[name] = factory(jQuery, MagnificentAnalytics));
    });
  } else if (typeof exports === 'object') {
    module.exports = factory(require('jquery'), require('./mag-analytics'), require('jquery-bridget'));
  } else {
    root[name] = factory(root.jQuery, root.MagnificentAnalytics);
  }
}(this, function ($, MagnificentAnalytics) {

  var MagnificentControl = function (element, options) {
    this.element = $( element );
    this.options = $.extend( true, {}, this.options, options );
    this._init();
  };

  MagnificentControl.prototype._init = function () {

    var $el = this.element;
    var el = $el.get(0);

    this.$mag = $(this.options.mag);
    this.mag = this.$mag.get(0);
    this.magInst = this.$mag.data('mag');

    var $mag = this.$mag;
    var mag = this.mag;
    var magInst = this.magInst;

    $el.find('[mag-ctrl-zoom-by], [data-mag-ctrl-zoom-by]')
    .on('click', function () {
      var attr = $(this).attr('mag-ctrl-zoom-by') || $(this).attr('data-mag-ctrl-zoom-by');
      var zoomBy = $.parseJSON(attr);
      magInst.zoomBy(zoomBy);
    });

    $el.find('[mag-ctrl-move-by-x], [mag-ctrl-move-by-y], [data-mag-ctrl-move-by-x], [data-mag-ctrl-move-by-y]')
    .on('click', function () {
      var attr = $(this).attr('mag-ctrl-move-by-x') || $(this).attr('data-mag-ctrl-move-by-x');
      var x = attr;
      if (x) {
        x = $.parseJSON(x);
      }
      attr = $(this).attr('mag-ctrl-move-by-y') || $(this).attr('data-mag-ctrl-move-by-y');
      var y = attr;
      if (y) {
        y = $.parseJSON(y);
      }
      var moveBy = {
        x: x,
        y: y
      };
      magInst.moveBy(moveBy);
    });

    $el.find('[mag-ctrl-fullscreen], [data-mag-ctrl-fullscreen]')
    .on('click', function () {
      if (screenfull) {
        if (screenfull.enabled) {
          screenfull.request(mag);
        }
      }
    });

    $el.find('[mag-ctrl-destroy], [data-mag-ctrl-destroy]')
    .on('click', function () {
      magInst.destroy();
    });
	
	$el.find('[mag-ctrl-center-and-default-size], [data-mag-ctrl-center-and-default-size]')
    .on('click', function () {
		var moveTo = {
        x: 0.5,
		y: 0.5
      };			
      magInst.moveTo(moveTo);
	  magInst.zoomTo(1);
    });
  };


  $.bridget('magCtrl', MagnificentControl);


  if (MagnificentAnalytics) {
    MagnificentAnalytics.track('mag-control.js');
  }

  return MagnificentControl;
}));
