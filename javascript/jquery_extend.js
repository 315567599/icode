/**sample 1**/
$.fn.myPlugin = function(options) {
    var defaults = {
        'color': 'red',
        'fontSize': '12px'
    };
    var settings = $.extend(defaults, options);
    return this.css({
        'color': settings.color,
        'fontSize': settings.fontSize
    });
}
$('a').myPlugin({
    'color': 'red'
});

/**sample 2**/
//定义Beautifier的构造函数
var Beautifier = function(ele, opt) {
    this.$element = ele,
    this.defaults = {
        'color': 'red',
        'fontSize': '12px',
        'textDecoration':'none'
    },
    this.options = $.extend({}, this.defaults, opt)
}
//定义Beautifier的方法
Beautifier.prototype = {
    beautify: function() {
        return this.$element.css({
            'color': this.options.color,
            'fontSize': this.options.fontSize,
            'textDecoration': this.options.textDecoration
        });
    }
}
//在插件中使用Beautifier对象
$.fn.myPlugin = function(options) {
    //创建Beautifier的实体
    var beautifier = new Beautifier(this, options);
    //调用其方法
    return beautifier.beautify();
}

$(function() {
    $('a').myPlugin({
        'color': '#2C9929',
        'fontSize': '20px'
    });
})

/**sample 3**/
n($, window, document,undefined) {
    //定义Beautifier的构造函数
    var Beautifier = function(ele, opt) {
        this.$element = ele,
        this.defaults = {
            'color': 'red',
            'fontSize': '12px',
            'textDecoration': 'none'
        },
        this.options = $.extend({}, this.defaults, opt)
    }
    //定义Beautifier的方法
    Beautifier.prototype = {
        beautify: function() {
            return this.$element.css({
                'color': this.options.color,
                'fontSize': this.options.fontSize,
                'textDecoration': this.options.textDecoration
            });
        }
    }
    //在插件中使用Beautifier对象
    $.fn.myPlugin = function(options) {
        //创建Beautifier的实体
        var beautifier = new Beautifier(this, options);
        //调用其方法
        return beautifier.beautify();
    }
})(jQuery, window, document);

