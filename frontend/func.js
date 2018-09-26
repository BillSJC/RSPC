function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

function ajaxSendResuestToAPI(tragetUrl,handler){
    token = localStorage.getItem("accessToken")
    if(token == null){
            alert("您还未登录，请先登录！");
            window.location("https://rspc.hduhelp.com/login.html");
            return -1;
    }
    resp = $.ajax({
        url:tragetUrl,
        async:false,
        type:"get",
        headers: {
                "Authorization":"token "+token
        },
        success: function(data) {
                handler(data);
                return 1;
        },
        error: function(err) {
                console.log("error in ajax:"+error)
                return 0;
        },
    })
}

function checkToken(){
        if(getToken()==null){
                return false;
        }
        return true;
}

function getToken(){
        return localStorage.getItem("accessToken");
}

function insertToken(token){
        localStorage.setItem("accessToken",token);
}