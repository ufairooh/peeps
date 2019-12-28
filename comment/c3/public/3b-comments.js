var comments = {
  ajax: function (opt) {
  // ajax() : do AJAX request
  // PARAM opt : AJAX options

    // APPEND FORM DATA
    var data = new FormData();
    for (var key in opt.data) {
      data.append(key, opt.data[key]);
    }

    // INIT AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "2c-ajax-comments.php", true);

    // WHEN THE PROCESS IS COMPLETE
    xhr.onload = function () {
      if (typeof (opt.load) == "function") {
        opt.load(this.response);
      }
    };

    // SEND
    xhr.send(data);
  },

  load: function () {
  // load() : load comments

    comments.ajax({
      data: {
        req: "show",
        post_id: document.getElementById("post_id").value
      },
      load: function (res) {
        document.getElementById("comments").innerHTML = res;
      }
    });
  },

  reply: function (cid, rid) {
  // reply() : load reply docket
  // PARAM cid : comment ID
  //       rid : reply ID

    comments.ajax({
      data: {
        req: "reply",
        reply_id: rid
      },
      load: function (res) {
        document.getElementById("reply-" + cid).innerHTML = res;
      }
    });
  },

  add: function (el) {
  // add() : add a new reply
  // PARAM el : reference to reply form

    // DATA
    var data = {
      req: "add",
      post_id: document.getElementById("post_id").value,
      name: el.querySelector('input[name="name"]').value,
      message: el.querySelector('textarea[name="message"]').value
    };
    var replyID = el.querySelector('input[name="reply_id"]').value;
    if (replyID != "") {
      data['reply_id'] = replyID;
    }

    // AJAX
    comments.ajax({
      data: data,
      load: function (res) {
        if (res == "OK") {
          // Clear comments
          el.querySelector('input[name="name"]').value = "";
          el.querySelector('textarea[name="message"]').value = "";
          
          // Refresh comments
          comments.load();
        } else {
          alert("ERROR");
        }
      }
    });
    return false;
  }
};

// INIT - LOAD COMMENTS + REPLY DOCKET
window.addEventListener("load", function () {
  comments.load();
  comments.reply("main", "");
});