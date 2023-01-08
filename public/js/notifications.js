
var btn = document.querySelector("#btn_notification")
var user_id = document.querySelector("#user_id").value


btn.addEventListener('click',()=>{
    fetch('/api/marks/notifications/'+user_id)
  .then((response) => response.json())
  .then((data) => console.log(data));
})