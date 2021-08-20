
(async () => {
   
    const respuestaRaw = await fetch("./../controlador/obtener_datos_ajax.php")
    const $data = await respuestaRaw.json()
 
    
  let $count=$data.length

const $dia=[]
const $monto=[]
const $cantMesas=[]
for (let i=0;i<$count;i++){
      $dia.push($data[i].dia)
      $monto.push($data[i].monto)
      $cantMesas.push($data[i].cantMesas)
}
//console.log($dia)
//console.log($monto)
//console.log($cantMesas)



const $ctx=document.getElementById("myChart").getContext("2d")
  
const datos = {//data de libreria
labels: $dia,
datasets: [
  {
    label: 'Monto',
    data:$monto,
//    borderColor: ['rgb(66,134,244)'],
    backgroundColor:['rgb(66,134,244)',
      'rgb(74,135,72)',
      'rgb(229,89,50)'
    ],
    stack: 'combined',
    type: 'bar'
  },
  {
    label: 'Mesas',
    data: $cantMesas,
   borderColor: ['rgb(153, 255, 153)'],
    backgroundColor:['rgb(66,134,244)',
      'rgb(74,135,72)',
      'rgb(229,89,50)'
    ],
    stack: 'combined'
  }
]
};
const config = {//config de libre
type: 'line',
data: datos,
options: {
  plugins: {
    title: {
      display: true,
      text: 'Ventas Registradas 2021'
    }
  },
  scales: {
    y: {
      stacked: true
    }
  }
},
};
var mychar=new Chart($ctx,config)// libreria




})();