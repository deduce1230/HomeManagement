function recording(area,mic_id){
    var recognition = new webkitSpeechRecognition();
    recognition.onresult = function(event) {
      if (event.results.length > 0) {
        document.getElementById(area).value = event.results[0][0].transcript;
        recording_end(mic_id);
      }
    }
    recording_start(mic_id);
    recognition.start();
}

function recording_start(mic_id){
    micon(document.getElementById(mic_id));
    setTimeout(micoff, 5000, document.getElementById(mic_id));
}

function recording_end(mic_id){
    micoff(document.getElementById(mic_id));
}

function micon(obj) {
    var icon = obj;
    //if (icon.classList.contains("fa-microphone")) {
    //    icon.classList.remove("fa-microphone");
    //    icon.classList.add("fa-microphone-alt");
    //} else {
    //   icon.classList.remove("fa-microphone-alt");
    //   icon.classList.add("fa-microphone");
    //}
    icon.classList.remove("fa-microphone");
    icon.classList.add("fa-microphone-alt");
}

function micoff(obj) {
    var icon = obj;
    //if (icon.classList.contains("fa-microphone")) {
    //    icon.classList.remove("fa-microphone");
    //    icon.classList.add("fa-microphone-alt");
    //} else {
    //   icon.classList.remove("fa-microphone-alt");
    //   icon.classList.add("fa-microphone");
    //}
    icon.classList.remove("fa-microphone-alt");
    icon.classList.add("fa-microphone");
}

