/**
 * Función para convertir fechas.
 **/
function formatearFecha(fecha)
{
    var fechaSinFormato = fecha.split(" ");
    var fechaSeparada = fechaSinFormato[0].split("-");
    var mes = fechaSeparada[1].replace("01", "Enero")
        .replace("02", "Febrero")
        .replace("03", "Marzo")
        .replace("04", "Abril")
        .replace("05", "Mayo")
        .replace("06", "Junio")
        .replace("07", "Julio")
        .replace("08", "Agosto")
        .replace("09", "Septiembre")
        .replace("10", "Octubre")
        .replace("11", "Noviembre")
        .replace("12", "Diciembre");
    var fechaFormateada = fechaSeparada[2] + " " + mes + " " + fechaSeparada[0];
    return fechaFormateada;
}
/**
 * Para convertir un segmento de texto html a string sin etiquetas html.
 **/
function htmlToString(texto)
{
    var inicioEtiqueta = texto.indexOf("<p");
    var finEtiqueta = texto.indexOf(">");
    var subcadena = texto.replace("&lt;p style=&quot;", "").replace("font-size: ", "")
            .replace(" style=&quot;", "")
            .replace("&quot;&gt;", "")
            .replace("&lt;/p&gt;", ".")
            .replace("&lt;/li&gt;", ".")
            .replace(" style=", "")
            .replace("font-family: ", "")
            .replace("line-height: ", "")
            .replace("color: rgba", "")
            .replace("&nbsp;&lt;a href=", "")
            .replace("&lt;ul", "")
            .replace("&lt;/ul&gt;", "")
            .replace("&lt;ol", "")
            .replace("&lt;/ol&gt;", "")
            .replace("&lt;span ", "")
            .replace("&lt;/span&gt;", "")
            .replace("<p style=\"","")
            .replace("</p>",".")
            .replace("<li ", "")
            .replace("</li>",".")
            .replace("<ul ","")
            .replace("</ul>","")
            .replace("</ol>", "");
    console.log("Inicio " + inicioEtiqueta);
    console.log("Fin "+finEtiqueta);
    var textoSinHtml = subcadena.substring(finEtiqueta+1,60);
    console.log(textoSinHtml);
    return textoSinHtml;
}
