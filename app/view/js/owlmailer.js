        var running = false;
        var request;
 
    Array.prototype.randomElement = function () {
  return this[Math.floor(Math.random() * this.length)]
 }

 function stopSending()
 {
    running = false;

    if (request) {
        request.abort();
      }

    $("#btnStart").attr("disabled", false);
    $("#btnStop").attr("disabled", true);
 }

 function handleSendingResponse(recipient, response, processedCount, totalEmailCount) {
  $("#progress").append('<div class="col-lg-3">' + processedCount.toString() + '/' + totalEmailCount.toString() + '</div><div class="col-lg-6">' + recipient + '</div>');
  
  if (response == "OK"){
    $("#progress").append('<div class="col-lg-1"><span class="label label-success">Ok</span></div>');
  }
  else if(response == "Incorrect Email"){
    $("#progress").append('<div class="col-lg-1"><span class="label label-default">Incorrect Email</span></div>');
  } else {
    $("#progress").append('<div class="col-lg-1"><span class="label label-default">' + response + '</span></div>');
  }
  $("#progress").append('<br>');
 }

 function startSending() {

 var myContent = tinymce.get("myTextAreaSec").getContent();
  $('#myTextAreaSec').html(myContent);

  var eMailTextArea = document.getElementById("emailList");
  var eMailTextAreaLines = eMailTextArea.value.split("\n");
  var smtpAccountsTextArea = document.getElementById("smtpAccounts");
  var smtpAccountsTextAreaLines = smtpAccountsTextArea.value.split("\n");
  var encodingTypeE = document.getElementById('encoding');
  var encodingType = encodingTypeE.options[encodingTypeE.selectedIndex].value;
  var emailPriorityE = document.getElementById('priority');
  var emailPriority = emailPriorityE.options[emailPriorityE.selectedIndex].value;
 
   var form_data = new FormData();
   form_data.append("action", "send");
   form_data.append("sendingMethod", document.querySelector('input[name="sendingMethod"]:checked').value);
   form_data.append("senderEmail", document.getElementById('senderEmail').value);
   form_data.append("senderName", document.getElementById('senderName').value);
   form_data.append("replyTo", document.getElementById('replyTo').value);
   form_data.append("messageSubject", document.getElementById('subject').value);
   form_data.append("messageLetter", tinymce.get("myTextAreaSec").getContent());
   form_data.append("altMessageLetter", document.getElementById('altMessageLetter').value);
   form_data.append("messageType", document.querySelector('input[name="messageType"]:checked').value);
   form_data.append("encodingType", encodingType);
   form_data.append("emailPriority", emailPriority);

   for (var x = 0; x < document.getElementById('attachment').files.length; x++) {
      form_data.append("attachment[]", document.getElementById('attachment').files[x]);
   }

  $("#progress").empty();
  var processedCount = 0;
  $(function () {
    var i = 0;
    running = true;

    $("#btnStart").attr("disabled", true);
    $("#btnStop").attr("disabled", false);


    function nextCall() {
      if (i == eMailTextAreaLines.length){

         $("#btnStart").attr("disabled", false);
         $("#btnStop").attr("disabled", true);
         return; //last call was last item in the array
      }

      // Abort any pending request
      if (request) {
        request.abort();
      }
       if(!running)
      {
        return;
      }

      var recipient = eMailTextAreaLines[i++]
      form_data.append("recipient", recipient);
      form_data.append("smtpAcct", smtpAccountsTextAreaLines.randomElement());

      request = $.ajax({
        url : "../app/lib/owl.php",
        type: "post",
        data: form_data,
        contentType: false,
        processData: false,
      });
      // Callback handler that will be called on success
      request.done(function (response, textStatus, jqXHR) {
        processedCount += 1;
        handleSendingResponse(recipient, response, processedCount, eMailTextAreaLines.length);
        nextCall();
      });
    }
    nextCall();
  });
 }
