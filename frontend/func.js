function getQueryVariable(variable){
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

function ajaxSendResuestToAPI(tragetUrl){
    token = localStorage.getItem("accessToken")
    if(token == null){
            alert("您还未登录，请先登录！");
            window.location("https://rspc.hduhelp.com/login.html");
            return -1;
    }
        return $.ajax({
        url:tragetUrl,
        async:true,
        type:"get",
        headers: {
                "Authorization":"token "+token
        }
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