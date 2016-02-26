/**
 * 
 */

var refresher = {
	countDown: {'maxCountDown': 600, 'stopCountDown': false}

    ,ips: {
        "10.48.50.71" : {'success': false}
        ,"10.48.50.72" : {'success': false}
        ,"10.48.50.73" : {'success': false}
        ,"10.48.50.74" : {'success': false}
        ,"10.48.50.75" : {'success': false}
        ,"10.48.50.76" : {'success': false}
        ,"10.48.50.77" : {'success': false}

        ,"10.48.50.48" : {'success': false} //productionclone
        ,"10.48.52.12" : {'success': false} //test 1
        ,"10.48.52.13" : {'success': false} //test 2
        ,"10.48.52.14" : {'success': false} //test 3
    }

    ,getRow: function(data) {
        var tmp = {};
        tmp.row = $('<tr ip="' + data.ip + '" class="processing"></tr>').data('data', data);
        if(data.msg) {
            tmp.row.html('<td colspan=7>' + data.msg + '</td>');
        } else {
            tmp.row.html('<td>' + data.server + '</td>'
            		+ '<td>' + data.ip + '</td>'
            		+ '<td>' + data.branch + '</td>'
            		+ '<td>' + data.version + '</td>'
            		+ '<td>' + data.location + '</td>'
            		+ '<td>' + data.mode + '</td>'
            		+ '<td>'
            		 + '<span class="btn-group btn-group-xs">'
            		 	+ '<span class="btn btn-default gitu-update-btn" title="Update this branch on this server">'
	            		 	+ '<span class="glyphicon glyphicon-import"></span>'
            		 	+ '</span>'
            		 	+ '<span class="btn btn-default gitu-switch-btn" title="Switch to another branch on this server">'
            		 		+ '<span class="glyphicon glyphicon-transfer"></span>'
            		 	+ '</span>'
            		 + '</span>'
            		+ '</td>'
            );
        }
        return tmp.row;
    }

    ,loadOneServerRow: function (ip, resultdiv){
        var tmp = {};
        tmp.me = this;
        tmp.row = $('[ip="' + ip + '"]');
        if(tmp.row.hasClass('processing')) {
            tmp.ajax = $.data(tmp.row, 'ajax');
            if(tmp.ajax)
                tmp.ajax.abort();
        }

        tmp.ajax = $.ajax({
            'url': 'getInfo.php'
            ,dataType: "json"
            ,'data': {'ip': ip}
            ,'type': 'POST'
            ,'beforeSend': function() {
                tmp.rowNew = tmp.me.getRow({'ip': ip, 'msg': 'Getting Info From ' + ip + ' ...'}).addClass('warning');
            	if(!tmp.row || tmp.row.length === 0) {
                    $(resultdiv).append(tmp.rowNew);
                } else  {
                	tmp.row.replaceWith(tmp.rowNew);
                }
            }
        });
        $.data(tmp.row, 'ajax', tmp.ajax);

        tmp.ajax.success(function(data){
        	tmp.newRow = tmp.me.getRow(data);
        	$('[ip="' + ip + '"]').replaceWith(tmp.newRow);
        	 $('.gitu-update-btn', tmp.newRow).click(function() {
             	alert('WIP ...');
             });
             $('.gitu-switch-btn', tmp.newRow).click(function() {
             	alert('WIP ...');
             });
        })
        .fail(function(jqXHR, textStatus){
        	$('[ip="' + ip + '"]').replaceWith(tmp.me.getRow({'ip': ip, 'msg': 'Error: ' + textStatus}).addClass('danger'));
        })
        .done(function() {
        	$('[ip="' + ip + '"]').removeClass('processing');
        });
        return tmp.me;
    }

    ,_loadAll: function(resultDivSelector, ips) {
        var tmp = {};
        tmp.me = this;
        tmp.me.ips = (ips || tmp.me.ips);
        $.each(tmp.me.ips, function(ip, info) {
            tmp.me.loadOneServerRow(ip, $(resultDivSelector));
        });
        return tmp.me;
    }

    ,load: function(resultDivSelector, countDownSelector, refreshBtn) {
    	var tmp = {};
    	tmp.me = this;
    	tmp.resultDiv = $(resultDivSelector);
    	if(tmp.resultDiv.length === 0)
    		return tmp.me;

    	tmp.refreshBtn = $(refreshBtn);
    	if(tmp.refreshBtn) {
    		tmp.refreshBtn.click(function() {
    			refresher._loadAll(resultDivSelector);
    		})
    		.click();
    	} else {
    		refresher._loadAll(resultDivSelector);
    	}

        tmp.countDown = $(countDownSelector);
        if(tmp.countDown) {
        	tmp.countDown.html(tmp.me.countDown.maxCountDown);
        	//hide a div after 3 seconds
        	setInterval(function(){
        		if(tmp.countDown.length === 0)
        			return;
        		if(tmp.countDown.html() * 1 > 0) {
        			if(tmp.me.countDown.stopCountDown !== true)
        				tmp.countDown.html(tmp.countDown.html() * 1 - 1);
        		}
        		else {
        			tmp.countDown.html(refresher.countDown);
        			refresher._loadAll(resultDivSelector);
        		}
        	}, 1000);
        }
    }
};


