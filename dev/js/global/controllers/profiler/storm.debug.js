;( function ($, _, undefined) {
    "use strict";
    ips.createModule('storm.debug', function () {
        var respond = function (elem, options, e) {
                var el = $(elem);
                if (!el.data('_debugObj')) {
                    var d = _debugObj(options.url);
                    var el = $('#stormProfilerLogs');
                    var time = el.attr('data-stormtime');
                    d.init(time);
                    el.data('_debugObj', d);
                }
        };
        ips.ui.registerWidget('stormdebug', storm.debug, ['url']);
        return {
            respond: respond
        };
    });
    var _debugObj = function(url){
        var init = function(time){
            _debug(time);
        };
        var _debug = function(time){
            var ajax = ips.getAjax();
            var el = $('#stormProfilerLogs');
            var times = '';
            ajax({
                type: "POST",
                url: url,
                data: "time="+ time,
                dataType: "json",
                bypassRedirect: true,
                success: function (data) {
                    if (!data.hasOwnProperty('error')) {
                        el.prepend( data.html );
                        var counts = parseInt( $('#profilerLogTabCount').text() )+ parseInt(data.count);
                        $('#profilerLogTabCount').html( counts );
                    }
                    el.attr( 'data-stormtime', data.time);
                    times = data.time;
                },
                complete: function (data) {
                    _debug(times);
                },
                error: function (data) {
                }
            });
        }

        return {
            init: init
        }
    }
}(jQuery, _));
