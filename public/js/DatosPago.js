
const valores = window.location.search;
      const urlParams = new URLSearchParams(valores);
      var consulta = urlParams.get("consulta");
console.log(consulta)

const valores2 = window.location.search;
      const urlParams2 = new URLSearchParams(valores2);
      var status = urlParams2.get("collection_status");
console.log(status)

const valores3 = window.location.search;
      const urlParams3 = new URLSearchParams(valores3);
      var transaccion = urlParams3.get("payment_id");


let url = '/api/create/pago/consult?consulta='+consulta+"&status="+status+"&transaccion="+transaccion

fetch(url, {
    method: 'GET', 
  }).then(res => res.json())
  .catch(error => {
        
  })
