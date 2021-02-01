/* Please edit the root */
var wtmt_root = 'http://localhost/chat/flat-visual-chat/'; // ex : http://www.mywebsite/


/* Core : don't modify */
if (wtmt_root.substr(wtmt_root.length-1,1) != "/"){
    wtmt_root = wtmt_root+'/';
}
if(document.location.href.indexOf('https://')>=0 && wtmt_root.indexOf('https://')<0){
    wtmt_root = 'https'+wtmt_root.substr(4,wtmt_root.length);
} else if(document.location.href.indexOf('http://')>=0 && wtmt_root.indexOf('https://')>=0){
    wtmt_root = 'http'+wtmt_root.substr(5,wtmt_root.length);
}
var timerJS = false; 
var styleA = document.createElement("link");
styleA.type = "text/css";
styleA.rel = "stylesheet";
styleA.href = wtmt_root+"flat-visual-chat/assets/css/flatVisualChat.css";
document.getElementsByTagName("head")[0].appendChild(styleA);
var styleB = document.createElement("script");
styleB.type = "text/css";
styleB.rel = "stylesheet";

styleB.href = wtmt_root+"flat-visual-chat/assets/css/colors_front.css";
document.getElementsByTagName("head")[0].appendChild(styleB);

if (!window.jQuery) {

    timerJS = setInterval(function(){
        if (window.jQuery) {
            clearInterval(timerJS);
            loadChatScript();
        }
    },800);

    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = wtmt_root+"flat-visual-chat/assets/js/jquery-1.11.1.min.js";
    document.getElementsByTagName("head")[0].appendChild(script);
} else {
    loadChatScript();
}

function loadChatScript() {
    var scriptM = document.createElement("script");
    scriptM.type = "text/javascript";
    scriptM.src = wtmt_root+"flat-visual-chat/assets/js/jquery-migrate-1.2.1.min.js";
    document.getElementsByTagName("head")[0].appendChild(scriptM);


    var scriptC = document.createElement("script");
    scriptC.type = "text/javascript";
    scriptC.src = wtmt_root+"flat-visual-chat/assets/js/flatVisualChat.js";
    document.getElementsByTagName("head")[0].appendChild(scriptC);
}
