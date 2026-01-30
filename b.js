// Datos de ejemplo
const datos = {
  fechas: ['2022-01-01', '2022-01-02', '2022-01-03'],
  mascotas: ['Mascota 1', 'Mascota 2', 'Mascota 3'],
  cantidad_ips: [
    [3, 5, 2],
    [4, 2, 6],
    [1, 3, 4]
  ]
};

// Crear los datos de las barras
const data = [];
for (let i = 0; i < datos.mascotas.length; i++) {
  const trace = {
    x: datos.fechas,
    y: datos.cantidad_ips.map(row => row[i]),
    name: datos.mascotas[i],
    type: 'bar'
  };
  data.push(trace);
}

// Configurar el diseño del gráfico
const layout = {
  barmode: 'group'
};

// Crear el gráfico de barras agrupadas
Plotly.newPlot('barrasAgrupadasChart', data, layout);
