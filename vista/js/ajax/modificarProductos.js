var btnModificar = document.getElementById('modificar');
/**HOy en dia lo mas comodo es trabajar con JSON
 * este ejemplo es con .txt
 * JSON: tecnologia de transporte. JSON entiende muy bien JS
 * 
 */
//btnModificar.addEventListener("click",function(){
    const url = "js/ajax/datDos.txt"; //consultamos a esta url
    //quiero que me consultes esta url
    fetch(url)
    .then(response => {
        console.log(response);
      /*  console.log(response.status);
        console.log(response.statusText);
        console.log(response.url);
        console.log(response.type);*/
        
        if(response.ok && response.status == 200){
            console.log("Todo esta bien");

        }

        /**Los datos van con este fragmento
         * sin este RETURN no se imprimen los datos
         */
        return response.text();//la respuesta la quiero como txt
    })
    .then(datos =>{
        //contenido del archivo
        console.log(datos);
    })
    //muestra los errores
    .catch(error =>{
        console.log(error);        
        
    })
//});