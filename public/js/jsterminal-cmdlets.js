/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var term_about_text = {
  text: "[[;#00ee11;#000]{Bit:Griefer}] Terminal.  Version 1.0 an implementation of jcubic-jquery-term" +
            "\ndesigned and implemented in Laravel 4 by P.MacArthur (BitGriefer)" +
            "\nLayout and iconography done in Bootstrap 3 by Twitter."
}

var term_about = {
    name: "about",
    fn: function(args, terminal) {
        terminal.echo(this.text);
    },
    text: term_about_text.text
};

var term_help = {
  name: "help",
  fn: function(args, terminal) {
    terminal.echo(this.text);
  },
  text: term_about_text.text
}

var term_reload = {
    name: "reload",
    fn: function(args, terminal) {
        terminal.echo("- Reloading...");
        location.reload();
    }
};

var term_toggleJS = {
    name: "togglejs",
            fn: function(args, terminal) {
                allowJS = !allowJS;
                terminal.echo("- JSEval: " + allowJS);
            }
};

var term_listCmds = {
    name: "list-cmdlets",
            fn: function(args, terminal) {
                terminal.echo("Hooked Commands: \n" + listCommandHooks());
            }
};

var term_get = { 
    name: "get",
            fn: function(args, terminal) {
        
            }
};

var term_echo = { 
    name: "echo",
            fn: function(args, terminal) {
                terminal.echo(args);
            }
};

var lorde_dollar = {
  name: "lorde$",
  lorde_dollar: 145000000,
  fn: function(args, terminal) {
      if (args === null) {
        terminal.echo("- lorde$:  usage lorde$ <usd>\n\te.g. lorde$ 34");
        return;
      } else {
        terminal.echo("- lorde$: $" + args + " USD is worth " + (args / this.lorde_dollar).toFixed(2) + " Lorde Dollars");
      }
  }
}

var lorde_cent = {
  name: "lordec",
  lorde_cent: 2000000,
  fn: function(args, terminal) {
      if (args === null) {
        terminal.echo("- " + this.name + ":  usage " + this.name + " <usd>\n\te.g. " + this.name + " 34");
        return;
      } else {
        terminal.echo("- " + this.name + ": $" + args + " USD is worth " + (args / this.lorde_cent) + " Lorde Cents");
      }
  }
}

var lorde_time = {
  name: "lordedate",
  lordetime: "Nov,7,1996",
  fn: function(args, terminal) {
    var t1 = new Date(this.lordetime);
    var t2 = new Date();
    terminal.echo("- " + this.name + ": " + DateDiff.inDays(t1,t2).toFixed(2) + " Lordes");
  }
}

var lorde_len = {
  name: "lordelen",
  lordelen: 173,
  fn: function(args, terminal) {
      if (args === null) {
        terminal.echo("- " + this.name + ":  usage " + this.name + " <cm>\n\te.g. " + this.name + " 34");
        return;
      } else {
        terminal.echo("- " + this.name + ": " + args + " CM is " + (args / this.lordelen) + " Lordes");
      }
  }
}


var DateDiff = {

    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();

        return  (t2-t1)/(24*3600*1000);
    },

    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();

        return parseInt((t2-t1)/(24*3600*1000*7));
    },

    inMonths: function(d1, d2) {
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth();
        var d2M = d2.getMonth();

        return (d2M+12*d2Y)-(d1M+12*d1Y);
    },

    inYears: function(d1, d2) {
        return d2.getFullYear()-d1.getFullYear();
    }
}


var minecraft_uuid = {
  name:"get-mcuuid",
  fn: function(args,terminal) {
    
    var mojangAPI = "https://api.mojang.com/users/profiles/minecraft/" + args;
    var fetchURI = "mojang/" + args;
    terminal.echo("\nMinecraft User: " + mojangAPI);
    
    $.getJSON(fetchURI, function(data) {
      terminal.echo("ID: " + data.id);
      terminal.echo("Name: " + data.name + "\n");
    }).fail(function() {
      terminal.echo("Mojang API not available.");
    });
    
  }
}


registerCommand(term_about);
registerCommand(term_help);
registerCommand(term_reload);
registerCommand(term_toggleJS);
registerCommand(term_listCmds);
registerCommand(term_echo);
registerCommand(lorde_dollar);
registerCommand(lorde_cent);
registerCommand(lorde_time);
registerCommand(lorde_len);

registerCommand(minecraft_uuid);