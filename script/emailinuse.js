function checkemail(url) {
  let usermail = document.getElementById("email").value;

  return fetch(url, {
    method: "post",
    headers: { "Content-type": "application/x-www-form-urlencoded" },
    body: "email=" + usermail,
  }).then(function (response) {
    if (response.status !== 200) {
      console.log("ERROR CODE: " + response.status);
      return;
    }
    return response.text();
  }).then(function (result) {
      if (result == "nogood")
        document.getElementById("errormail").innerHTML = "This e-mail is already in use, please try a different one";
      else document.getElementById("errormail").innerHTML = "";
  });
}
