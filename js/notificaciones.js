$(document).ready(function () {
	const cuerpoTabla = document.querySelector("#cuerpo-tabla");

	let limite = 5;
	let desde = 0;
	let paginas = info.length / limite;
	let paginaActiva = 1;
	let text = "";

	let arreglo = info.slice(desde, limite);
	

	const cargarProductos = () => {text = "";
		cuerpoTabla.innerHTML = text;
		$.each(arreglo, function (i, item) {
			
			const contenido = `<div class="dropdown-divider"></div>            
			<a class="dropdown-item preview-item">
			<div class="preview-thumbnail">
			<div class="preview-icon bg-dark rounded-circle">
			<i class="mdi mdi-basket-unfill text-danger"></i>
			</div>
			</div>              
			<div class="preview-item-content">
			<p class="preview-subject mb-1"> ${item.medico}</p>
			
			<p class="text-muted ellipsis mb-0">CI: ${item.ci_medico} - Cumplimiento: ${item.Cumplimiento}%</p>
			</div>
			</a>`;
			text += contenido;
			
			//cargarItemPaginacion();
		});
		cuerpoTabla.innerHTML =`<h6  class="p-3 mb-0">Notificaciones</h6>    
    		<div id="items" class="d-flex"></div>` +text+`<div class="dropdown-divider"></div>
			
			`;
			cargarItemPaginacion();
	};
	

	const cargarItemPaginacion = () => {
		document.querySelector("#items").innerHTML = "";
		for (let index = 0; index < paginas; index++) {
			const item = document.createElement("a");
			item.id="a_"+index;
			item.classList = `page-item text-center ${paginaActiva == index + 1 ? "active" : ""}`;
			const enlace = `<p class="page-link datos" onmouseover="pasarPagina(${index})">${
				index + 1
			}</p>`;
			item.innerHTML = enlace;
			document.querySelector("#items").append(item);
		}
	};

	
	const modificarArregloProductos = () => {
		arreglo = info.slice(desde, limite * paginaActiva);
		cargarProductos();
	};

	window.pasarPagina = (pagina) => {		
		paginaActiva = pagina + 1;
		desde = limite * pagina; //5
		if (desde <= info.length) {
			modificarArregloProductos();
		} 
	};

	
	

	
	
	
	cargarProductos();
});
