function showChatBox() {
  var chatBox = document.getElementById("chatBox");
  var chatOpenIcon = document.getElementById("chatOpenIcon");
  var chatCloseIcon = document.getElementById("chatCloseIcon");
  if (chatBox.style.display == "block") {
    chatBox.style.display = "none";
    chatOpenIcon.style.display = "block";
    chatCloseIcon.style.display = "none";
  } else {
    chatBox.style.display = "block";
    chatCloseIcon.style.display = "block";
    chatOpenIcon.style.display = "none";
  }
}

function addDeleteId(modalInputId, dbId) {
  console.log(dbId);
  document.getElementById(modalInputId).value = dbId;
}
