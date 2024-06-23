let productos = [];

fetch("./js/productos.json")
    .then(response => response.json())
    .then(data => {
        productos = data;
        cargarProductos(productos);
    })


/* const contenedorProductos = document.querySelector("#contenedor-productos"); */

const contenedorHogar =document.querySelector("#contenedor-productos-hogar");
const contenedorAutomoviles =document.querySelector("#contenedor-productos-automoviles");
const contenedorTecnologia =document.querySelector("#contenedor-productos-tecnologia");
const botonesCategorias = document.querySelectorAll(".boton-categoria");
const tituloPrincipal = document.querySelector("#titulo-principal");
let botonesAgregar = document.querySelectorAll(".producto-agregar");
const numerito = document.querySelector("#numerito");
const contenedorJuego=document.querySelector(".contenedor-juego");

botonesCategorias.forEach(boton => boton.addEventListener("click", () => {
    aside.classList.remove("aside-visible");
}))


function cargarProductos(productosElegidos) {

   /*  contenedorProductos.innerHTML = ""; */
   contenedorHogar.innerHTML="";
   contenedorAutomoviles.innerHTML="";
   contenedorTecnologia.innerHTML="";


    productosElegidos.forEach(producto => {

        const div = document.createElement("div");
        div.classList.add("producto", "animate__animated","animate__zoomInUp");
        


        div.innerHTML = `
           
            <img class="producto-imagen"  src="${producto.imagen}" alt="${producto.titulo}">
            <div class="producto-detalles">
                <h3 class="producto-titulo">${producto.titulo}</h3>
                <p class="producto-precio">$${producto.precio}</p>
                <button class="producto-agregar" id="${producto.id}">Agregar</button>
            </div>
        `;

        if (producto.categoria.id === "Tecnologia") {
             contenedorTecnologia.append(div);
              /* h31.textContent="${producto.categoria.name}";  */
             

        } else if (producto.categoria.id === "Hogar") {
            contenedorHogar.append(div);
          /*   h32.textContent="${producto.categoria.id}"; */

         } else if (producto.categoria.id === "Automoviles") {
          contenedorAutomoviles.append(div);
    

         } /* else if (producto.categoria.id===undefined){
            const div1.innerText = `
            <div id="board"></div>
            <div class="boardInfo">
                <div>
                    Score: <div id="scoreBoard"></div>
                </div>
                <button id="start">Start</button>
            </div>
            <div id="gameOver">Game Over</div>`;
            contenedorJuego.append(div);
            contenedorJuego.classList.add("disabled");
         } */
       
       /*  contenedorProductos.append(div); */
    }
    )
   


    actualizarBotonesAgregar();
}


botonesCategorias.forEach(boton => {
    const h3= document.querySelectorAll("h3");
    boton.addEventListener("click", (e) => {

        botonesCategorias.forEach(boton => boton.classList.remove("active"));
        e.currentTarget.classList.add("active");

        if (e.currentTarget.id != "todos") {
            const productoCategoria = productos.find(producto => producto.categoria.id === e.currentTarget.id);
            tituloPrincipal.innerText = productoCategoria.categoria.nombre;
            const productosBoton = productos.filter(producto => producto.categoria.id === e.currentTarget.id);
            h3.forEach(h3=>h3.remove());
            cargarProductos(productosBoton);
        } else {
            tituloPrincipal.innerText = "Todos los productos";
            
            cargarProductos(productos);
        }

    })
});

function actualizarBotonesAgregar() {
    botonesAgregar = document.querySelectorAll(".producto-agregar");

    botonesAgregar.forEach(boton => {
        boton.addEventListener("click", agregarAlCarrito);
    });
}

let productosEnCarrito;

let productosEnCarritoLS = localStorage.getItem("productos-en-carrito");

if (productosEnCarritoLS) {
    productosEnCarrito = JSON.parse(productosEnCarritoLS);
    actualizarNumerito();
} else {
    productosEnCarrito = [];
}

function agregarAlCarrito(e) {

    Toastify({
        text: "Producto agregado",
        duration: 3000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, #f99b3d, rgb(255, 128, 0)",
          borderRadius: "2rem",
          textTransform: "uppercase",
          fontSize: ".75rem"
        },
        offset: {
            x: '1.5rem', // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: '1.5rem' // vertical axis - can be a number or a string indicating unity. eg: '2em'
          },
        onClick: function(){} // Callback after click
      }).showToast();

    const idBoton = e.currentTarget.id;
    const productoAgregado = productos.find(producto => producto.id === idBoton);

    if(productosEnCarrito.some(producto => producto.id === idBoton)) {
        const index = productosEnCarrito.findIndex(producto => producto.id === idBoton);
        productosEnCarrito[index].cantidad++;
    } else {
        productoAgregado.cantidad = 1;
        productosEnCarrito.push(productoAgregado);
    }

    actualizarNumerito();

    localStorage.setItem("productos-en-carrito", JSON.stringify(productosEnCarrito));
}

function actualizarNumerito() {
    let nuevoNumerito = productosEnCarrito.reduce((acc, producto) => acc + producto.cantidad, 0);
    numerito.innerText = nuevoNumerito;
}