document.getElementById("download-pdf").addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    doc.setFont("helvetica");
    doc.setFontSize(10);

    // Agregar título
    doc.text("Asignación de Áreas", 10, 10);
    let y = 20; // Altura inicial para el primer texto

    // Obtener las filas de la tabla
    const table = document.getElementById("areas-table");

    // Iterar por las filas de la tabla
    Array.from(table.rows).forEach((row, index) => {
        if (index === 0) return; // Saltar la fila del encabezado

        const cells = row.cells;
        const rowData = [
            cells[0].textContent, // #
            cells[1].textContent, // ID Area
            cells[2].textContent, // Área
            //cells[3].textContent, //Estado
            //cells[4].textContent, //Descripción
        ];

        // Formatear los datos de cada fila
        const rowText = rowData.join(" | ");

        // Agregar cada fila de datos al PDF
        doc.text(rowText, 10, y);
        y += 10; // Ajusta la altura para la siguiente fila

        // Si la página está llena, agrega una nueva
        if (y > 270) {
            doc.addPage();
            y = 10; // Reinicia la altura al principio
        }
    });

    // Descargar el PDF
    doc.save("areas_asignacion.pdf");
});

document
  .getElementById("download-excel")
  .addEventListener("click", function () {
    const table = document.getElementById("areas-table");

    // Ocultar la columna "Acciones" (la última columna)
    const rows = table.querySelectorAll("tr");
    rows.forEach(row => {
      const cells = row.querySelectorAll("td, th"); // Obtener todas las celdas (td, th)
      if (cells.length > 3) {  // Asegurarse de que no sea la fila del encabezado
        cells[3].style.display = "none";  // Ocultar la columna de "Acciones"
      }
    });

    // Generar el archivo Excel
    const wb = XLSX.utils.table_to_book(table, { sheet: "Áreas" });
    XLSX.writeFile(wb, "areas_asignacion.xlsx");

    // Restaurar la visibilidad de la columna "Acciones"
    rows.forEach(row => {
      const cells = row.querySelectorAll("td, th");
      if (cells.length > 3) {
        cells[3].style.display = "";  // Restaurar la visibilidad
      }
    });
  });
