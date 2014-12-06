var commandHooks = [];
var allowJS = false;


String.prototype.strip = function(char) {
    return this.replace(new RegExp("^" + char + "*"), '').
            replace(new RegExp(char + "*$"), '');
};


$.extend_if_has = function(desc, source, array) {
    for (var i = array.length; i--; ) {
        if (typeof source[array[i]] !== 'undefined') {
            desc[array[i]] = source[array[i]];
        }
    }
    return desc;
};


(function($) {
    $.fn.tilda = function(eval, options) {
        if ($('body').data('terminal_bg')) {
            return $('body').data('terminal_bg').terminal;
        }
        this.addClass('terminal_bg');
        options = options || {};
        eval = eval || function(command, term) {
            term.echo("you don't set eval for tilda");
        };
        var settings = {
            prompt: 'ready> ',
            name: 'tilda',
            height: 100,
            enabled: false,
            greetings: '[[;#00ee11;#000]{Bit:Griefer}] Terminal.',
            keypress: function(e) {
                if (e.which === 96) {
                    return false;
                }
            }
        };
        if (options) {
            $.extend(settings, options);
        }
        this.append('<div class="td"></div>');
        var self = this;
        self.terminal = this.find('.td').terminal(eval, settings);
        var focus = false;
        $(document.documentElement).keypress(function(e) {
            if (e.which === 96) {
                self.slideToggle('fast');
                self.terminal.focus(focus = !focus);
                self.terminal.attr({
                    scrollTop: self.terminal.attr("scrollHeight")
                });
            }
        });
        $('body').data('terminal_bg', this);
        this.hide();
        return self;
    };
})(jQuery);


jQuery(document).ready(function($) {

    $('#terminal_bg').tilda(function(command, terminal) {
        var value;
        var cmd_text = command.split(/\s(.+)?/)[1];
        var cmd_name = command.split(/\s(.+)?/)[0];
      
        if(typeof cmd_text === "undefined") { cmd_text = null; }

        if (callHooks(cmd_name, cmd_text, terminal) === false) {
            if (allowJS) {
                eval("value = " + command);
                if (value === null || value === undefined) {
                    value = command;
                }
                ;
                terminal.echo('- "' + value + '"');
            } else {
                terminal.echo('- ' + command + ': command not found');
            }
        }
    });

});


function registerCommand(functionObject) {
    commandHooks.push(functionObject);
}

function callHooks(commandName, args, terminal) {
    var hooked = false;
    for (var i = 0; i < commandHooks.length; i++) {
        if (commandHooks[i].name === commandName) {
            commandHooks[i].fn(args, terminal);
            hooked = true;
        }
    }
    return hooked;
}


function listCommandHooks() {
    var hooknames = [];
    for(var i = 0; i < commandHooks.length; i++) {
        hooknames.push(commandHooks[i].name);
    }
    return hooknames;
}


