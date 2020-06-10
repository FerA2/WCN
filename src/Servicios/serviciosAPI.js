//Servicios para comunicarse con la API

const baseURL="http://localhost/web/Proyecto/WcnAPI/";
/*
function read(datos){
  
    let finalURL= baseURL+datos.url;
    fetch(finalURL, {
      method: "GET",
      headers: { "Content-Type": "application/json" },
      body: datos.body
    })
      .then(data => data.json())
      .then(data => {
        if (data.msg) this.msg = data.msg;
        //else this.loginUser(data[0]);
        //this.msg = data.msg;
      })
      .catch(error => console.error(error));
}
 */
function update(datos){
  
  let finalURL= baseURL+datos.url;
  fetch(finalURL, {
    method: "PUT",
    headers: { "Content-Type": "application/json" },
    body: datos.body
  })
    .then(data => data.json())
    .then(data => {
      if (data.msg) this.msg = data.msg;
      //else this.loginUser(data[0]);
      //this.msg = data.msg;
    })
    .catch(error => console.error(error));
}