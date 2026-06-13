var recognition = new webkitSpeechRecognition();
  recognition.onresult = function(event) {
  if (event.results.length > 0) {
    q.value = event.results[0][0].transcript;
  }
}

var recognition2 = new webkitSpeechRecognition();
  recognition2.onresult = function(event) {
  if (event.results.length > 0) {
    obj.value = event.results[0][0].transcript;
  }
}

function hm_recognition(str){
    var local_recognition = new webkitSpeechRecognition();
    local_recognition.start();

    var obj = $('input[name="recipe_nm"]');
    local_recognition.onresult = function(event) {
        if (event.results.length > 0) {
            obj.value = event.results[0][0].transcript;
            alert(obj);
        }
    }
}
